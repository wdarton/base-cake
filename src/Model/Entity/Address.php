<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $line_1
 * @property string $line_2
 * @property string $line_3
 * @property string $municipality
 * @property string $region
 * @property string $postal_code
 * @property string $country
 *
 * @property \App\Model\Entity\BranchOffice[] $branch_offices
 */
class Address extends Entity
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
        'line_1' => true,
        'line_2' => true,
        'line_3' => true,
        'municipality' => true,
        'region' => true,
        'postal_code' => true,
        'iso3166_country_id' => true,
        'branch_offices' => true
    ];
}
