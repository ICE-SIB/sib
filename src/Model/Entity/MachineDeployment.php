<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * MachineDeployment Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $machine_id
 * @property int $from_warehouse
 * @property int $to_warehouse
 * @property string $responsible
 * @property string $management_center
 * @property string $rate_type
 * @property string $service_order
 * @property \Cake\I18n\Time $datetime
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Machine $machine
 */
class MachineDeployment extends Entity
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
    	return __('{0}\'s Deployment', $this->machine->name);
    }
    
    protected function _getRateTypeLabel() {
    	switch($this->rate_type) {
    		case 'h':
    			return __('Hourly');
    			break;
    		case 'd':
    			return __('Daily');
    			break;
    	}
    }
}
