<?php
namespace App\Model\Behavior;

use Cake\ORM\Behavior;
use Cake\ORM\Table;
use Cake\Event\Event;
use Cake\Datasource\EntityInterface;
use Cake\ORM\TableRegistry;

/**
 * Address behavior
 */
class AddressBehavior extends Behavior
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * Useful to auto delete an address record when a associated record is also deleted.
     * Example: People have addresses, if a person is deleted this will auto delete the
     * associated address. This should work across multiple entities.
     */
    function beforeDelete(Event $event, EntityInterface $entity)
    {
    	$addresses = TableRegistry::get('Addresses');
    	if ($entity->address_id) {
    		// See if there is an address record for this
    		$address = $addresses->get($entity->address_id);

    		if ($address) {
    			$addresses->delete($address);
    		}
    	}
    }
}
