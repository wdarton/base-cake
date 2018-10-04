<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * UserRoles Controller
 *
 * @property \App\Model\Table\UserRolesTable $UserRoles
 *
 * @method \App\Model\Entity\UserRole[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserRolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->UserAction->logAction(__FILE__);

        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $userRoles = $this->paginate($this->UserRoles);

        $this->set(compact('userRoles'));
    }

    /**
     * View method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $userRole = $this->UserRoles->get($id, [
            'contain' => ['UserGroups']
        ]);

        $this->set('userRole', $userRole);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userRole = $this->UserRoles->newEntity();
        if ($this->request->is('post')) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->getData());
            if ($this->UserRoles->save($userRole)) {
                $this->UserAction->logAction(__FILE__, $userRole->id);

                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserRoles->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userRole', 'userGroups'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userRole = $this->UserRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userRole = $this->UserRoles->patchEntity($userRole, $this->request->getData());
            $dirtyFields = $userRole->getDirty();

            if ($this->UserRoles->save($userRole)) {
                $this->UserAction->logAction(__FILE__, $id, $dirtyFields, $userRole);

                $this->Flash->success(__('The user role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user role could not be saved. Please, try again.'));
        }
        $userGroups = $this->UserRoles->UserGroups->find('list', ['limit' => 200]);
        $this->set(compact('userRole', 'userGroups'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $this->request->allowMethod(['post', 'delete']);
        $userRole = $this->UserRoles->get($id);
        if ($this->UserRoles->delete($userRole)) {
            $this->Flash->success(__('The user role has been deleted.'));
        } else {
            $this->Flash->error(__('The user role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
