<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Billboards Model
 *
 * @method \App\Model\Entity\Billboard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Billboard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Billboard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Billboard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Billboard|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Billboard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Billboard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Billboard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class BillboardsTable extends Table
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
       
        $this->addBehavior('Translate', ['fields' => ['billboard_details']]);
        $this->setTable('billboards');
        $this->setDisplayField('billboard_id');
        $this->setPrimaryKey('billboard_id');
      
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
            ->integer('billboard_id')
            ->allowEmpty('billboard_id', 'create');

        $validator
            ->scalar('billboard_details')
            ->maxLength('billboard_details', 255)
            ->requirePresence('billboard_details', 'create')
            ->notEmpty('billboard_details');

        return $validator;
    }
}
