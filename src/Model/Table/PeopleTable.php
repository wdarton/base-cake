<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * People Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Person get($primaryKey, $options = [])
 * @method \App\Model\Entity\Person newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Person[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Person|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Person patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Person[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Person findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PeopleTable extends Table
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

        $this->setTable('people');
        $this->setDisplayField('full_name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('UsersAudit');
        $this->addBehavior('Address');
        $this->addBehavior('Boolean', [
            'booleans' => [
                'supervisor',
                'archived',
            ]
        ]);
        $this->addBehavior('MySQLDateConversion', [
            'dates' => [
                'birth_date',
            ]
        ]);

        $this->belongsTo('Addresses', [
            'foreignKey' => 'address_id'
        ]);
        $this->hasOne('Users', [
            'foreignKey' => 'person_id'
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
            ->scalar('first_name')
            ->maxLength('first_name', 150)
            ->allowEmpty('first_name');

        $validator
            ->scalar('middle_name')
            ->maxLength('middle_name', 150)
            ->allowEmpty('middle_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 150)
            ->allowEmpty('last_name');

        $validator
            ->scalar('work_phone')
            ->maxLength('work_phone', 100)
            ->allowEmpty('work_phone');

        $validator
            ->scalar('home_phone')
            ->maxLength('home_phone', 100)
            ->allowEmpty('home_phone');

        $validator
            ->scalar('cellphone')
            ->maxLength('cellphone', 100)
            ->allowEmpty('cellphone');

        $validator
            ->scalar('fax')
            ->maxLength('fax', 100)
            ->allowEmpty('fax');

        $validator
            ->scalar('personal_email')
            ->add('personal_email', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'Email must be valid'
                ])
            ->maxLength('personal_email', 200)
            ->allowEmpty('personal_email');

        $validator
            ->scalar('work_email')
            ->add('work_email', 'validFormat', [
                    'rule' => 'email',
                    'message' => 'Email must be valid'
                ])
            ->maxLength('work_email', 200)
            ->allowEmpty('work_email');

        $validator
            ->date('birth_date')
            ->allowEmpty('birth_date');

        $validator
            ->scalar('default_timezone')
            ->maxLength('default_timezone', 100)
            ->allowEmpty('default_timezone');

        $validator
            ->boolean('supervisor')
            ->allowEmpty('supervisor');

        $validator
            ->boolean('archived')
            ->allowEmpty('archived');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        $validator
            ->scalar('modified_by')
            ->maxLength('modified_by', 200)
            ->allowEmpty('modified_by');

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
        $rules->add($rules->existsIn(['address_id'], 'Addresses'));

        return $rules;
    }


}
