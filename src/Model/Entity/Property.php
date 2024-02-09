<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Property Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $street_address
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $price
 * @property int $baths
 * @property int $beds
 * @property int $sqft
 * @property string $acres
 * @property bool $active
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 *
 * @property \App\Model\Entity\Ammenity[] $ammenities
 */
class Property extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'name' => true,
        'description' => true,
        'street_address' => true,
        'city' => true,
        'state' => true,
        'postal_code' => true,
        'price' => true,
        'baths' => true,
        'beds' => true,
        'sqft' => true,
        'acres' => true,
        'active' => true,
        'created' => true,
        'modified' => true,
        'ammenities' => true,
    ];
}
