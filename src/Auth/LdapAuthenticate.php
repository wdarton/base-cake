<?php
namespace App\Auth;

use Cake\Auth\BaseAuthenticate;
use Cake\Http\ServerRequest;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

class LdapAuthenticate extends BaseAuthenticate
{
	protected $_ldap_server = '192.168.1.177';
	protected $_users_dn = "ou=Users,ou=Main Office,dc=darton,dc=local";
	protected $base_dn = 'dc=darton,dc=local';
    protected $logon_domain = "darton.local";

    public function authenticate(ServerRequest $request, Response $response)
    {
    	$username = trim($request->data['username']);
    	$password = $request->data['password'];

    	$ldap_conn = @ldap_connect($this->_ldap_server);
    	if(!$ldap_conn)
    	{
    		return false;
    	}

    	$ldap_bind = @ldap_bind($ldap_conn, $username.'@'.$this->logon_domain, $password);
    	if(!$ldap_bind)
    	{
    		return false;
    	}

    	// Find the users info in AD

    	$filter = "(sAMAccountName={$username})";
    	$search = @ldap_search($ldap_conn, $this->_users_dn, $filter);
        $entry = @ldap_get_entries($ldap_conn, $search);
    	if(!$entry)
        {
            return false;
        }
    	$user = [];

    	$entry = $entry[0];
    	foreach ($entry as $key => $value) {
    		$user[$key] = $value;
    	}


        // Check to see if this user exists in the database
        $users = TableRegistry::get('Users');
        $query = $users
            ->find()
            ->where([
                'username' => $username,
            ]);

        $result = $query->first();

        if ($result) {
            $user = $result;
        } else {
            return false;
        }

        // Check to see if the user is locked
        if ($user['locked']) {
            return -1;
        }

        // Make sure they are authorized for this app
        // if(in_array('CN,OU,DC to group', $entry['memberof']))
        // {
        //     $user['memberof'] = $entry['memberof'];
        // }
        // else
        // {
        //     return false;
        // }

        $people = TableRegistry::get('People');

        $person = $people->get($user['person_id'], [
                'contain' => [],
            ]);

        $user['full_name'] = $person->full_name;

    	// Close connection and return the user
    	ldap_close($ldap_conn);
    	return $user;
    }

}

?>