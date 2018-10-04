<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;

/**
 * User Entity
 *
 * @property int $id
 * @property int $person_id
 * @property string $username
 * @property int $login_count
 * @property \Cake\I18n\FrozenTime $last_logon
 * @property bool $locked
 * @property \Cake\I18n\FrozenTime $created
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modified_by
 *
 * @property \App\Model\Entity\Person $person
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'person_id' => true,
        'user_group_id' => true,
        'user_role_id' => true,
        'username' => true,
        'login_count' => true,
        'last_logon' => true,
        'locked' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'person' => true
    ];

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->user_role_id)) {
            $roleId = $this->user_role_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['user_role_id']])->where(['id' => $this->id])->first();
            $roleId = $user->user_role_id;
        }
        if (!$roleId) {
            return null;
        }
        return ['UserRoles' => ['id' => $roleId]];
    }
}
