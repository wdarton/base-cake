<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Iso3166Countries Model
 *
 * @property |\Cake\ORM\Association\HasMany $Addresses
 *
 * @method \App\Model\Entity\Iso3166Country get($primaryKey, $options = [])
 * @method \App\Model\Entity\Iso3166Country newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Iso3166Country[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Iso3166Country|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Iso3166Country patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Iso3166Country[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Iso3166Country findOrCreate($search, callable $callback = null, $options = [])
 */
class Iso3166CountriesTable extends Table
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

        $this->setTable('iso3166_countries');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->hasMany('Addresses', [
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
            ->scalar('label')
            ->maxLength('label', 255)
            ->requirePresence('label', 'create')
            ->notEmpty('label');

        $validator
            ->scalar('alpha_2')
            ->maxLength('alpha_2', 2)
            ->requirePresence('alpha_2', 'create')
            ->notEmpty('alpha_2');

        $validator
            ->scalar('alpha_3')
            ->maxLength('alpha_3', 3)
            ->requirePresence('alpha_3', 'create')
            ->notEmpty('alpha_3');

        $validator
            ->scalar('region')
            ->maxLength('region', 255)
            ->allowEmpty('region');

        $validator
            ->scalar('sub_region')
            ->maxLength('sub_region', 255)
            ->allowEmpty('sub_region');

        return $validator;
    }
}
