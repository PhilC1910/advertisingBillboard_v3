<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * HiringParties Model
 *
 * @property \App\Model\Table\RefHiringPartyTypesTable|\Cake\ORM\Association\BelongsTo $RefHiringPartyTypes
 *
 * @method \App\Model\Entity\HiringParty get($primaryKey, $options = [])
 * @method \App\Model\Entity\HiringParty newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\HiringParty[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\HiringParty|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HiringParty|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\HiringParty patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\HiringParty[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\HiringParty findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HiringPartiesTable extends Table
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

        $this->setTable('hiring_parties');
        
        $this->addBehavior('Translate', ['fields' => ['hiring_party_details']]);
        $this->setDisplayField('hiring_party_id');
        $this->setPrimaryKey('hiring_party_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('RefHiringPartyTypes', [
            'foreignKey' => 'hiring_party_type_code_id',
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
            ->integer('hiring_party_id')
            ->allowEmpty('hiring_party_id', 'create');

        $validator
            ->scalar('hiring_party_details')
            ->maxLength('hiring_party_details', 255)
            ->requirePresence('hiring_party_details', 'create')
            ->notEmpty('hiring_party_details');

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
        $rules->add($rules->existsIn(['hiring_party_type_code_id'], 'RefHiringPartyTypes'));

        return $rules;
    }
}
