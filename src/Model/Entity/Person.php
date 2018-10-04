<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Person Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $work_phone
 * @property string $home_phone
 * @property string $cellphone
 * @property string $fax
 * @property int $address_id
 * @property string $personal_email
 * @property string $work_email
 * @property \Cake\I18n\FrozenDate $birth_date
 * @property string $default_timezone
 * @property bool $supervisor
 * @property bool $archived
 * @property \Cake\I18n\FrozenTime $created
 * @property string $created_by
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $modified_by
 *
 * @property \App\Model\Entity\User[] $users
 */
class Person extends Entity
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
        'first_name' => true,
        'middle_name' => true,
        'last_name' => true,
        'work_phone' => true,
        'home_phone' => true,
        'cellphone' => true,
        'fax' => true,
        'address_id' => true,
        'personal_email' => true,
        'work_email' => true,
        'birth_date' => true,
        'default_timezone' => true,
        'supervisor' => true,
        'archived' => true,
        'created' => true,
        'created_by' => true,
        'modified' => true,
        'modified_by' => true,
        'users' => true
    ];

    protected function _getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
