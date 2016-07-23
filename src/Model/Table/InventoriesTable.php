<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inventories Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Materials
 * @property \Cake\ORM\Association\BelongsTo $Warehouses
 * @property \Cake\ORM\Association\HasMany $Deposits
 * @property \Cake\ORM\Association\HasMany $Withdrawals
 *
 * @method \App\Model\Entity\Inventory get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inventory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inventory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inventory|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inventory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inventory findOrCreate($search, callable $callback = null)
 */
class InventoriesTable extends Table
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

        $this->table('inventories');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Materials', [
            'foreignKey' => 'material_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Warehouses', [
            'foreignKey' => 'warehouse_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Deposits', [
            'foreignKey' => 'inventory_id'
        ]);
        $this->hasMany('Withdrawals', [
            'foreignKey' => 'inventory_id'
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
            ->nonNegativeInteger('stock')
            ->requirePresence('stock', 'create')
            ->notEmpty('stock');

        $validator
            ->integer('area')
            ->requirePresence('area', 'create')
            ->notEmpty('area');

        $validator
            ->integer('shelf')
            ->requirePresence('shelf', 'create')
            ->notEmpty('shelf');

        $validator
            ->integer('body')
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->integer('side')
            ->requirePresence('side', 'create')
            ->notEmpty('side');

        $validator
            ->integer('platter')
            ->requirePresence('platter', 'create')
            ->notEmpty('platter');

        $validator
            ->allowEmpty('additional_notes');

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
        $rules->add($rules->existsIn(['material_id'], 'Materials'));
        $rules->add($rules->existsIn(['warehouse_id'], 'Warehouses'));
        return $rules;
    }
}
