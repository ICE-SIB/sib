<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * MachineDeployments Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Machines
 *
 * @method \App\Model\Entity\MachineDeployment get($primaryKey, $options = [])
 * @method \App\Model\Entity\MachineDeployment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\MachineDeployment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\MachineDeployment|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\MachineDeployment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\MachineDeployment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\MachineDeployment findOrCreate($search, callable $callback = null)
 */
class MachineDeploymentsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('machine_deployments');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Machines', [
            'foreignKey' => 'machine_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Origins', [
            'className' => 'Warehouses',
            'foreignKey' => 'from_warehouse',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Destinations', [
            'className' => 'Warehouses',
            'foreignKey' => 'to_warehouse',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->integer('machine_id')
            ->requirePresence('machine_id', 'create')
            ->notEmpty('machine_id');
            
        $validator
            ->integer('from_warehouse')
            ->requirePresence('from_warehouse', 'create')
            ->notEmpty('from_warehouse');

        $validator
            ->integer('to_warehouse')
            ->requirePresence('to_warehouse', 'create')
            ->notEmpty('to_warehouse');
            
        $validator
            ->requirePresence('responsible', 'create')
            ->notEmpty('responsible');

        $validator
            ->requirePresence('management_center', 'create')
            ->notEmpty('management_center');

        $validator
            ->requirePresence('service_order', 'create')
            ->notEmpty('service_order');

        $validator
            ->dateTime('datetime')
            ->requirePresence('datetime', 'create')
            ->notEmpty('datetime');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['machine_id'], 'Machines'));
        return $rules;
    }
    
    public function getAvailableRateTypes() {
    	return [
    			'h' => __('Hourly'),
    			'd' => __('Daily'),
    	];
    }
}
