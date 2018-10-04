<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * AddressManager component
 */
class AddressManagerComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    // private $config = [];
    private $addresses;
    private $iso3166Countries;
    public $components = ['UserAction'];

    public function initialize(array $user_config)
    {
        global $addresses;
    	global $iso3166Countries;
    	// $config = $user_config;
    	$addresses = TableRegistry::get('Addresses');
        $iso3166Countries = TableRegistry::get('Iso3166Countries');
    }

    public function newAddress($data)
    {
    	global $addresses;

        $address = $addresses->newEntity();
        $address = $addresses->patchEntity($address, $data);


        if ($addresses->save($address)) {
            $this->UserAction->logAddress(__FILE__, $address->id);
            return $address->id;
        } else {
        	return -1;
        }
    }

    public function getCountry($entity)
    {
        global $iso3166Countries;
        $country = $iso3166Countries->get($entity->address->iso3166_country_id);
        $entity->address->country = $country;

        return $entity;
    }

    public function getCountriesList($entity)
    {
        global $iso3166Countries;
        $countries = $iso3166Countries->find('list')->toArray();

        $entity->countries = $countries;
        return $entity;
    }

}
