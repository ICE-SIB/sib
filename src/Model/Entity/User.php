<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $role
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 *
 * @property \App\Model\Entity\Deposit[] $deposits
 * @property \App\Model\Entity\MachineDeployment[] $machine_deployments
 * @property \App\Model\Entity\Withdrawal[] $withdrawals
 */
class User extends Entity
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

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _getFullName() {
        return "$this->first_name $this->last_name";
    }
    
    protected function _getRoleLabel() {
        switch($this->role) {
            case 'a':
                return __('Administrator');
                break;
            case 'o':
                return __('Operator');
                break;
            case 'e':
                return __('Employee');
                break;
        }
    }

    protected function _setPassword($value) {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
