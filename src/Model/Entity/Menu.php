<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Menu Entity
 *
 * @property int $id
 * @property int $user_right_id
 * @property string $label
 * @property string $controller
 * @property string $controller_action
 * @property int $sort_order
 * @property bool $active
 *
 * @property \App\Model\Entity\UserRight $user_right
 * @property \App\Model\Entity\Page[] $pages
 */
class Menu extends Entity
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
        'label' => true,
        'prefix' => true,
        '_plugin' => true,
        'controller' => true,
        'controller_action' => true,
        'sort_order' => true,
        'active' => true,
        'literal' => true,
        'visible' => true,
        'user_right' => true,
        'pages' => true
    ];
}
