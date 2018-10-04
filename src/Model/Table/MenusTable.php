<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Menus Model
 *
 * @property \App\Model\Table\UserRightsTable|\Cake\ORM\Association\BelongsTo $UserRights
 * @property \App\Model\Table\PagesTable|\Cake\ORM\Association\HasMany $Pages
 *
 * @method \App\Model\Entity\Menu get($primaryKey, $options = [])
 * @method \App\Model\Entity\Menu newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Menu[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Menu|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Menu patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Menu[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Menu findOrCreate($search, callable $callback = null, $options = [])
 */
class MenusTable extends Table
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

        $this->setTable('menus');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->addBehavior('Boolean', [
            'booleans' => [
                'active',
                'literal',
                'visible',
            ]
        ]);

        $this->hasMany('Pages', [
            'foreignKey' => 'menu_id'
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
            ->scalar('prefix')
            ->maxLength('prefix', 255)
            ->allowEmpty('prefix');

        $validator
            ->scalar('_plugin')
            ->maxLength('_plugin', 255)
            ->allowEmpty('_plugin');

        $validator
            ->scalar('controller')
            ->maxLength('controller', 255)
            ->requirePresence('controller', 'create')
            ->notEmpty('controller');

        $validator
            ->scalar('controller_action')
            ->maxLength('controller_action', 255)
            ->requirePresence('controller_action', 'create')
            ->notEmpty('controller_action');

        $validator
            ->integer('sort_order')
            ->requirePresence('sort_order', 'create')
            ->notEmpty('sort_order');

        $validator
            ->boolean('active')
            ->requirePresence('active', 'create')
            ->notEmpty('active');

        $validator
            ->boolean('literal')
            ->requirePresence('literal', 'create')
            ->notEmpty('literal');

        $validator
            ->boolean('visible')
            ->requirePresence('visible', 'create')
            ->notEmpty('visible');

        return $validator;
    }
}
