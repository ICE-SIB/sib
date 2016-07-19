<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Machine Entity
 *
 * @property int $id
 * @property int $warehouse_id
 * @property int $code
 * @property string $name
 * @property bool $is_active
 * @property string $description
 *
 * @property \App\Model\Entity\Warehouse $warehouse
 * @property \App\Model\Entity\MachineDeployment[] $machine_deployments
 */
class Machine extends Entity
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
