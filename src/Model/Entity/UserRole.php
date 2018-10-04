<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserRole Entity
 *
 * @property int $id
 * @property int $user_group_id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Group $group
 */
class UserRole extends Entity
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
        'user_group_id' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'group' => true
    ];

    public function parentNode()
    {
        if (!$this->id) {
            return null;
        }
        if (isset($this->user_group_id)) {
            $userGroupId = $this->user_group_id;
        } else {
            $Users = TableRegistry::get('Users');
            $user = $Users->find('all', ['fields' => ['user_group_id']])->where(['id' => $this->id])->first();
            $userGroupId = $user->user_group_id;
        }
        if (!$userGroupId) {
            return null;
        }
        return ['UserGroups' => ['id' => $userGroupId]];
    }
}
