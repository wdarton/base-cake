<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * Addresses Model
 *
 * @method \App\Model\Entity\Address get($primaryKey, $options = [])
 * @method \App\Model\Entity\Address newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Address[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Address|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Address patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Address[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Address findOrCreate($search, callable $callback = null, $options = [])
 */
class AddressesTable extends Table
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

        $this->setTable('addresses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasOne('People', [
            'foreignKey' => 'address_id'
        ]);
        $this->belongsTo('Iso3166Countries', [
            'foreignKey' => 'iso3166_country_id'
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
            ->scalar('line_1')
            ->maxLength('line_1', 255)
            ->allowEmpty('line_1');

        $validator
            ->scalar('line_2')
            ->maxLength('line_2', 255)
            ->allowEmpty('line_2');

        $validator
            ->scalar('line_3')
            ->maxLength('line_3', 255)
            ->allowEmpty('line_3');

        $validator
            ->scalar('municipality')
            ->maxLength('municipality', 50)
            ->allowEmpty('municipality');

        $validator
            ->scalar('region')
            ->maxLength('region', 50)
            ->allowEmpty('region');

        $validator
            ->scalar('postal_code')
            ->maxLength('postal_code', 12)
            ->allowEmpty('postal_code');

        $validator
            ->scalar('iso3166_country_id')
            ->maxLength('iso3166_country_id', 255)
            ->allowEmpty('iso3166_country_id');

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
        $rules->add($rules->existsIn(['iso3166_country_id'], 'Iso3166Countries'));

        return $rules;
    }
}
