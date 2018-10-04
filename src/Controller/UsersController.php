<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;
use Cake\Core\Configure;

/**
 * Users Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->loadComponent('Ajax');

        $this->Auth->allow(['login', 'logout']);
    }

    public function login()
    {
        if ($this->Auth->user()) {
            $this->redirect(['controller' => 'pages', 'action' => 'dashboard']);
        }

        if ($this->request->is('post'))
        {

            // Make sure we have been given data
            if (empty($this->request->data['username']) || empty($this->request->data['password']))
            {
                $this->Flash->error('Please enter a username and password');
            }
            else
            {
                $this->loadModel('UserLogins');
                $userLogin = $this->UserLogins->newEntity();
                $userLogin->username = $this->request->data['username'];
                $userLogin->success = 0;
                $userLogin->ipv4_address = $this->request->clientIp();

                $user = $this->Auth->identify();
                if($user !== -1 && $user !== false)
                {
                    $userLogin->success = 1;
                    $userLogin->user_id = $user->id;
                    $this->UserLogins->save($userLogin);

                    $this->Auth->setUser($user);

                    // Set their last logon time
                    $now = Time::now();

                    $updateUser = $this->Users->get($this->Auth->user('id'), [
                        'contain' => []
                    ]);
                    $updateUser->set('last_logon', $now);
                    $updateUser->login_count ++;
                    // Mark the modified column as dirty making
                    // the current value be set on update.
                    $updateUser->dirty('modified', true);
                    $this->Users->save($updateUser);


                    return $this->redirect($this->Auth->redirectUrl('/pages/dashboard'));
                } elseif ($user == -1) {
                    $this->Flash->error(__('Your account is currently locked. Please contact your supervisor for assistance.'));
                } else {
                    $this->Flash->error(__('Invalid username or password, try again'));
                }

                $this->UserLogins->save($userLogin);
            }
        }
    }

    public function logout()
    {
        $this->request->session()->destroy();
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->UserAction->logAction(__FILE__);
        $users = $this->Users->find('all', [
            'contain' => ['People', 'UserGroups', 'UserRoles'],
        ]);

        $this->set(compact('users', 'people'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $this->loadModel('UserLogins');
        $this->loadModel('UserActionLogs');

        $user = $this->Users->get($id, [
            'contain' => ['People', 'UserGroups', 'UserRoles'],
        ]);

        $userLogins = $this->UserLogins->find('all', [
            'conditions' => [
                'or' => [
                    'user_id' => $id,
                    'username LIKE' => '%'.$user->username.'%'
                ]
            ],
            'limit' => '500',
            'order' => ['created' => 'DESC'],
        ]);

        $userLogins = $this->paginate($userLogins);

        $userActions = $this->UserActionLogs->find('all', [
            'conditions' => [
                'or' => [
                    'user_id' => $id,
                    'username LIKE' => '%'.$user->username.'%'
                ]
            ],
            'limit' => '500',
            'order' => ['created' => 'DESC'],
        ]);

        $this->getAclAccess($id);

        $this->set('user', $user);
        $this->set('userLogins', $userLogins);
        $this->set('userActions', $userActions);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->UserAction->logAction(__FILE__, $user->id);
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $people = $this->Users->People->find('list', ['limit' => 200]);
        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $userRoles = $this->Users->UserRoles->find('list', ['limit' => 200]);

        $this->set(compact('user', 'people', 'userGroups', 'userRoles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        if ($this->request->is(['ajax'])) {
            $data = $this->request->getData();
            $groupId = $data['user_group_id'];
            $roles = $this->Users->UserRoles->getRolesByGroup($groupId);
            $this->Ajax->sendToView($roles);
        }

        $user = $this->Users->get($id, [
            'contain' => ['People', 'UserGroups', 'UserRoles'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $dirtyFields = $user->getDirty();

            if ($this->Users->save($user)) {

                $this->UserAction->logAction(__FILE__, $id, $dirtyFields, $user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $userGroups = $this->Users->UserGroups->find('list', ['limit' => 200]);
        $userRoles = $this->Users->UserRoles->find('list', ['limit' => 200]);

        $this->set(compact('user', 'userGroups', 'userRoles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    /////////////////////////////
    // COPIED FROM ACL MANAGER //
    /////////////////////////////


    private function getAclAccess($id)
    {
        $this->loadModel('Acl.Permissions');

        // $this->UserAction->logActionAcl(__FILE__, $model);
        $this->model = 'Users';

        // if (!$model || !in_array($model, Configure::read('AclManager.aros'))) {
        //     $m = Configure::read('AclManager.aros');
        //     $model = $m[0];
        // }


        $Aro = $this->Users;
        $arosRes = $this->paginate($Aro->alias());
        $aros = $this->_parseAros($arosRes);
        $permKeys = $this->_getKeys();

        /**
         * Build permissions info
         */
        $acosRes = $this->Acl->Aco->find('all', ['order' => 'lft ASC'])->contain(['Aros'])->toArray();
        $this->acos = $acos = $this->_parseAcos($acosRes);

        $perms = array();
        $parents = array();
        foreach ($acos as $key => $data) {
            $aco = & $acos[$key];
            $aco = array('Aco' => $data['Aco'], 'Aro' => $data['Aro'], 'Action' => array());
            $id = $aco['Aco']['id'];

            // Generate path
            if ($aco['Aco']['parent_id'] && isset($parents[$aco['Aco']['parent_id']])) {
                $parents[$id] = $parents[$aco['Aco']['parent_id']] . '/' . $aco['Aco']['alias'];
            } else {
                $parents[$id] = $aco['Aco']['alias'];
            }

            $aco['Action'] = $parents[$id];

            // Fetching permissions per ARO
            $acoNode = $aco['Action'];

            foreach ($aros as $aro) {
                $aroId = $aro[$Aro->alias()]['id'];
                $evaluate = $this->_evaluate_permissions($permKeys, array('id' => $aroId, 'alias' => $Aro->alias()), $aco, $key);
                $perms[str_replace('/', ':', $acoNode)][$Aro->alias() . ":" . $aroId . '-inherit'] = $evaluate['inherited'];
                $perms[str_replace('/', ':', $acoNode)][$Aro->alias() . ":" . $aroId] = $evaluate['allowed'];
            }
        }

        $this->request->data = array('Perms' => $perms);
        // $this->set('model', $model);
        $this->set('manage', Configure::read('AclManager.aros'));
        $this->set('aroAlias', $Aro->alias());
        $this->set('aroDisplayField', $Aro->displayField());
        $this->set(compact('acos', 'aros'));
    }

    /**
     * Returns permissions keys in Permission schema
     * @see DbAcl::_getKeys()
     */
    protected function _getKeys() {
        $keys = $this->Permissions->schema()->columns();
        $newKeys = array();
        foreach ($keys as $key) {
            if (!in_array($key, array('id', 'aro_id', 'aco_id'))) {
                $newKeys[] = $key;
            }
        }
        return $newKeys;
    }

    /**
     * Returns an array with acos
     * @param Acos $acos Parse Acos entities and store into array formated
     * @return array
     */
    private function _parseAcos($acos) {
        $cache = [];
        foreach ($acos as $aco) {
            $data['Aco'] = [
                'id' => $aco->id,
                'parent_id' => $aco->parent_id,
                'foreign_key' => $aco->foreign_key,
                'alias' => $aco->alias,
                'lft' => $aco->lft,
                'rght' => $aco->rght,
            ];
            if (isset($aco->model)) {
                $data['Aco']['model'] = $aco->model;
            }

            $d = [];
            foreach ($aco['aros'] as $aro) {
                $d[] = [
                    'id' => $aro->id,
                    'parent_id' => $aro->parent_id,
                    'model' => $aro->model,
                    'foreign_key' => $aro->foreign_key,
                    'alias' => $aro->alias,
                    'lft' => $aro->lft,
                    'rght' => $aro->rght,
                    'Permission' => [
                        'aro_id' => $aro->_joinData->aro_id,
                        'id' => $aro->_joinData->id,
                        'aco_id' => $aro->_joinData->aco_id,
                        '_create' => $aro->_joinData->_create,
                        '_read' => $aro->_joinData->_read,
                        '_update' => $aro->_joinData->_update,
                        '_delete' => $aro->_joinData->_delete,
                    ]
                ];
            }

            $data['Aro'] = $d;

            array_push($cache, $data);
        }

        return $cache;
    }

    /**
     * Returns an array with aros
     * @param Aros $aros Parse Aros entities and store into an array.
     * @return array
     */
    private function _parseAros($aros) {
        $cache = array();
        foreach ($aros as $aro) {
            $data[$this->model] = [
                'id' => $aro->id,
                'created' => $aro->created,
                'modified' => $aro->modified
            ];

            if (isset($aro->group_id)) {
                $data[$this->model]['group_id'] = $aro->group_id;
            }
            if (isset($aro->role_id)) {
                $data[$this->model]['role_id'] = $aro->role_id;
            }
            if (isset($aro->name)) {
                $data[$this->model]['name'] = $aro->name;
            }
            if (isset($aro->username)) {
                $data[$this->model]['username'] = $aro->username;
            }

            array_push($cache, $data);
        }

        return $cache;
    }

    /**
     * Recursive function to find permissions avoiding slow $this->Acl->check().
     */
    private function _evaluate_permissions($permKeys, $aro, $aco, $aco_index) {

        $this->acoId = $aco['Aco']['id'];
        $result = $this->Acl->Aro->find('all', [
                    'contain' => ['Permissions' => function ($q) {
                            return $q->where(['aco_id' => $this->acoId]);
                        }
                            ],
                            'conditions' => [
                                'model' => $aro['alias'],
                                'foreign_key' => $aro['id']
                            ]
                        ])->toArray();

        $permissions = array_shift($result);
        $permissions = array_shift($permissions->permissions);

        $allowed = false;
        $inherited = false;
        $inheritedPerms = array();
        $allowedPerms = array();

        /**
         * Manually checking permission
         * Part of this logic comes from DbAcl::check()
         */
        foreach ($permKeys as $key) {
            if (!empty($permissions)) {
                if ($permissions[$key] == '-1') {
                    $allowed = false;
                    break;
                } elseif ($permissions[$key] == '1') {
                    $allowed = true;
                    $allowedPerms[$key] = 1;
                } elseif ($permissions[$key] == '0') {
                    $inheritedPerms[$key] = 0;
                }
            } else {
                $inheritedPerms[$key] = 0;
            }
        }

        if (count($allowedPerms) === count($permKeys)) {
            $allowed = true;
        } elseif (count($inheritedPerms) === count($permKeys)) {
            if ($aco['Aco']['parent_id'] == null) {
                $this->lookup +=1;
                $acoNode = (isset($aco['Action'])) ? $aco['Action'] : null;
                $aroNode = array('model' => $aro['alias'], 'foreign_key' => $aro['id']);
                $allowed = $this->Acl->check($aroNode, $acoNode);
                $this->acos[$aco_index]['evaluated'][$aro['id']] = array(
                    'allowed' => $allowed,
                    'inherited' => true
                );
            } else {
                /**
                 * Do not use Set::extract here. First of all it is terribly slow,
                 * besides this we need the aco array index ($key) to cache are result.
                 */
                foreach ($this->acos as $key => $a) {
                    if ($a['Aco']['id'] == $aco['Aco']['parent_id']) {
                        $parent_aco = $a;
                        break;
                    }
                }
                // Return cached result if present
                if (isset($parent_aco['evaluated'][$aro['id']])) {
                    return $parent_aco['evaluated'][$aro['id']];
                }

                // Perform lookup of parent aco
                $evaluate = $this->_evaluate_permissions($permKeys, $aro, $parent_aco, $key);

                // Store result in acos array so we need less recursion for the next lookup
                $this->acos[$key]['evaluated'][$aro['id']] = $evaluate;
                $this->acos[$key]['evaluated'][$aro['id']]['inherited'] = true;

                $allowed = $evaluate['allowed'];
            }
            $inherited = true;
        }

        return array(
            'allowed' => $allowed,
            'inherited' => $inherited,
        );
    }



}

