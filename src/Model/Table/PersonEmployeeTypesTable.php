<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PersonEmployeeTypes Model
 *
 * @method \App\Model\Entity\PersonEmployeeType get($primaryKey, $options = [])
 * @method \App\Model\Entity\PersonEmployeeType newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PersonEmployeeType[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PersonEmployeeType|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PersonEmployeeType patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PersonEmployeeType[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PersonEmployeeType findOrCreate($search, callable $callback = null, $options = [])
 */
class PersonEmployeeTypesTable extends Table
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

        $this->setTable('person_employee_types');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');
        $this->addBehavior('Boolean', [
            'booleans' => [
                'employee',
            ]
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
            ->boolean('employee')
            ->requirePresence('employee', 'create')
            ->notEmpty('employee');

        return $validator;
    }
}
