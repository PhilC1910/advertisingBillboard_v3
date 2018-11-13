<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RefHiringPartyTypes Model
 *
 * @method \App\Model\Entity\RefHiringPartyType get($primaryKey, $options = [])
 * @method \App\Model\Entity\RefHiringPartyType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\RefHiringPartyType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\RefHiringPartyType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefHiringPartyType|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\RefHiringPartyType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\RefHiringPartyType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\RefHiringPartyType findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RefHiringPartyTypesTable extends Table
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

        $this->setTable('ref_hiring_party_types');
        $this->setDisplayField('hiring_party_type_code_id');
        $this->setPrimaryKey('hiring_party_type_code_id');

        $this->addBehavior('Timestamp');
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
            ->integer('hiring_party_type_code_id')
            ->allowEmpty('hiring_party_type_code_id', 'create');

        $validator
            ->scalar('hiring_party_type_description')
            ->maxLength('hiring_party_type_description', 255)
            ->requirePresence('hiring_party_type_description', 'create')
            ->notEmpty('hiring_party_type_description');

        $validator
            ->scalar('advertising_agency_client')
            ->maxLength('advertising_agency_client', 255)
            ->requirePresence('advertising_agency_client', 'create')
            ->notEmpty('advertising_agency_client');

        return $validator;
    }
}
