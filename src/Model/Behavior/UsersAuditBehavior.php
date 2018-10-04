<?php
/**
 * for CakePHP 3.x
 * Activate this behavior on your models to set values (user ID) to "created_by" and "modified_by" columns on insert/update.
 * see http://book.cakephp.org/3.0/en/orm/behaviors.html#using-behaviors
 *
 * Please note that if you use such models from Shells(CLI), these values will be set to null.
 *
 * You also need to set a static property "sessionUserFullName" on AppController::initialize().
 *
 * NOTE: In order for this to properly work, created_by and modified_by must be set to allow empty
 * within the table file. The database can still require the created_by field to not be null, but
 * CakePHP must think that it is possible. This event is fired after the initial validation of the
 * entity during its creation.
 *
 *
 */
namespace App\Model\Behavior;
use Cake\ORM\Behavior;
use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Entity;
use ArrayObject;

class UsersAuditBehavior extends Behavior
{
    public function beforeSave(Event $event, Entity $entity, ArrayObject $options)
    {
        $sessionUserFullName = AppController::$sessionUserFullName;

        if (empty($entity['id'])) {
            $entity['created_by'] = $sessionUserFullName;
        }
        $entity['modified_by'] = $sessionUserFullName;
    }
}