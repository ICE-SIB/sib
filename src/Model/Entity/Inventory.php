<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inventory Entity
 *
 * @property int $id
 * @property int $material_id
 * @property int $warehouse_id
 * @property int $stock
 * @property int $area
 * @property int $shelf
 * @property int $body
 * @property int $side
 * @property int $platter
 * @property string $additional_notes
 *
 * @property \App\Model\Entity\Material $material
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\Deposit[] $deposits
 * @property \App\Model\Entity\Withdrawal[] $withdrawals
 */
class Inventory extends Entity
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
    
    protected function _getTitle() {
        return "{$this->material->name} ({$this->warehouse->project_name})";
    }
}
