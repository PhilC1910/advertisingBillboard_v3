<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BillboardsHired Model
 *
 * @property \App\Model\Table\BillboardsTable|\Cake\ORM\Association\BelongsTo $Billboards
 * @property \App\Model\Table\HiringPartiesTable|\Cake\ORM\Association\BelongsTo $HiringParties
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\BillboardsHired get($primaryKey, $options = [])
 * @method \App\Model\Entity\BillboardsHired newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\BillboardsHired[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\BillboardsHired|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillboardsHired|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\BillboardsHired patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\BillboardsHired[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\BillboardsHired findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BillboardsHiredTable extends Table
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

        $this->setTable('billboards_hired');
        $this->setDisplayField('billboard_hire_id');
        $this->setPrimaryKey('billboard_hire_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Billboards', [
            'foreignKey' => 'billboard_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('HiringParties', [
            'foreignKey' => 'hiring_party_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->integer('billboard_hire_id')
            ->allowEmpty('billboard_hire_id', 'create');

        $validator
            ->dateTime('date_hired_from')
            ->requirePresence('date_hired_from', 'create')
            ->notEmpty('date_hired_from');

        $validator
            ->dateTime('date_hired_to')
            ->requirePresence('date_hired_to', 'create')
            ->notEmpty('date_hired_to');

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
        $rules->add($rules->existsIn(['billboard_id'], 'Billboards'));
        $rules->add($rules->existsIn(['hiring_party_id'], 'HiringParties'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
