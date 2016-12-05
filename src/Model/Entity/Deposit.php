<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Deposit Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $inventory_id
 * @property int $receipt_number
 * @property int $quantity
 * @property \Cake\I18n\Time $datetime
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Inventory $inventory
 */
class Deposit extends Entity
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
        '*' => true,
        'id' => false
    ];
}
