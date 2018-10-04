<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Iso3166Country Entity
 *
 * @property int $id
 * @property string $label
 * @property string $alpha_2
 * @property string $alpha_3
 * @property string $region
 * @property string $sub_region
 */
class Iso3166Country extends Entity
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
        'alpha_2' => true,
        'alpha_3' => true,
        'region' => true,
        'sub_region' => true
    ];
}
