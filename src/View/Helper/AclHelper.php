<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Acl helper
 */
class AclHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function aclCheck($entity)
    {
    	$authUser = $this->_View->get('authUser');
    	$acl = $this->_View->get('acl');

    	if (!isset($entity)) {
    		return false;
    	} else {
    		$aro = [
    		    'model' => 'Users',
    		    'foreign_key' => $authUser->id,
    		];
            if (is_object($entity)) {
        		$aco = $entity->controller.'/'.$entity->controller_action;

        		// Custom check for ACL menu option
        		if ($entity->controller === 'AclManager') {
        		    $aco = 'Acl/'.$entity->controller_action;
        		}
            } elseif (is_string($entity)) {
                $aco = $entity;
            }

    		$allowed = $acl->check($aro, $aco);

    		return $allowed;
    	}
    }

}
