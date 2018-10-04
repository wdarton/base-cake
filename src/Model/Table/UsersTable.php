<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\PeopleTable|\Cake\ORM\Association\BelongsTo $People
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('username');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('UsersAudit');
        $this->addBehavior('Acl.Acl', ['type' => 'requester']);
        $this->addBehavior('Boolean', [
            'booleans' => [
                'locked',
            ]
        ]);

        $this->belongsTo('People', [
            'foreignKey' => 'person_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserGroups', [
            'foreignKey' => 'user_group_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('UserRoles', [
            'foreignKey' => 'user_role_id',
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
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmpty('username')
            ->add('username', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('login_count')
            ->allowEmpty('login_count');

        $validator
            ->dateTime('last_logon')
            ->allowEmpty('last_logon');

        $validator
            ->boolean('locked')
            ->allowEmpty('locked');

        $validator
            ->scalar('created_by')
            ->maxLength('created_by', 255)
            ->allowEmpty('created_by');

        $validator
            ->scalar('modified_by')
            ->maxLength('modified_by', 255)
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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['person_id'], 'People'));
        $rules->add($rules->existsIn(['user_group_id'], 'UserGroups'));
        $rules->add($rules->existsIn(['user_role_id'], 'UserRoles'));

        $rules->add(function ($entity, $options) {
            // Lookup the role
            $role = $this->UserRoles->get($entity->user_role_id);

            if ($role->user_group_id === $entity->user_group_id) {
                return true;
            }

            return 'Please ensure that the selected role is associated with the selected group';
        }, 'roleGroupCheck', [
            'errorField' => 'user_role_id'
        ]);

        return $rules;
    }
}
