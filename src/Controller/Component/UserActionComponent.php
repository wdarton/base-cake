<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\TableRegistry;

/**
 * UserAction component
 */
class UserActionComponent extends Component
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];
    private $config = [];

    public function initialize(array $user_config)
    {
    	global $config;
    	$config = $user_config;
    }

    public function logAction($file, $entityId = null, $dirtyFields = null, $dirtyEntity = null)
    {
    	global $config;

    	$userActionLogs = TableRegistry::get('userActionLogs');

    	$userAction = $userActionLogs->newEntity();

        $userAction->user_id = $config['user_id'];
    	$userAction->username = $config['username'];
    	$userAction->controller = $config['controller'];
    	$userAction->controller_action = $config['controller_action'];
    	$userAction->file_location = $file;
    	$userAction->entity_id = $entityId;

    	if (!is_null($entityId)) {
	    	$entities = TableRegistry::get($userAction->controller);
	    	$entity = $entities->find('all', [
	    		'conditions' => [
	    			'id' => $entityId,
	    		],
	    		'limit' => '1',
	    	])->first();

	    	$displayField = $entities->getdisplayField();
	    	$userAction->entity_display_field = $entity->$displayField;
    	}

        if (!is_null($dirtyEntity)) {
            $dirtyValues = [];

            foreach ($dirtyFields as $field) {
                $dirtyValues[$field] = $dirtyEntity->$field;
            }
            $userAction->dirty_fields = print_r($dirtyValues, true);
        }

    	$userActionLogs->save($userAction);
    }

    public function logAddress($file, $entityId = null, $dirtyFields = null, $dirtyEntity = null)
    {
                global $config;

                $userActionLogs = TableRegistry::get('userActionLogs');

                $userAction = $userActionLogs->newEntity();

                $userAction->user_id = $config['user_id'];
                $userAction->username = $config['username'];
                $userAction->controller = 'Addresses';
                $userAction->controller_action = $config['controller_action'];
                $userAction->file_location = $file;
                $userAction->entity_id = $entityId;

                if (!is_null($entityId)) {
                    $entities = TableRegistry::get($userAction->controller);
                    $entity = $entities->find('all', [
                        'conditions' => [
                            'id' => $entityId,
                        ],
                        'limit' => '1',
                    ])->first();

                    $displayField = $entities->getdisplayField();
                    $userAction->entity_display_field = $entity->$displayField;
                }

                if (!is_null($dirtyEntity)) {
                    // For addresses print out the entire address
                    $userAction->dirty_fields = print_r($dirtyEntity->toArray(), true);
                }


                $userActionLogs->save($userAction);
    }

    public function logActionPages($file, $page)
    {
    	global $config;

    	$userActionLogs = TableRegistry::get('userActionLogs');

    	$userAction = $userActionLogs->newEntity();

        $userAction->user_id = $config['user_id'];
    	$userAction->username = $config['username'];
    	$userAction->controller = $config['controller'];
    	$userAction->controller_action = $page;
    	$userAction->file_location = $file;

    	$userActionLogs->save($userAction);
    }

    public function logActionAcl($file, $model)
    {
        global $config;

        $userActionLogs = TableRegistry::get('userActionLogs');

        $userAction = $userActionLogs->newEntity();

        $userAction->user_id = $config['user_id'];
        $userAction->username = $config['username'];
        $userAction->controller = $config['controller'];
        $userAction->controller_action = $model;
        $userAction->file_location = $file;

        $userActionLogs->save($userAction);
    }
}
