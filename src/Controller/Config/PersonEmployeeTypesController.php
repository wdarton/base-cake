<?php
namespace App\Controller\Config;

use App\Controller\AppController;

/**
 * PersonEmployeeTypes Controller
 *
 *
 * @method \App\Model\Entity\PersonEmployeeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PersonEmployeeTypesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Ajax');
    }

    /**
     * View method
     *
     * @param string|null $id Person Employee Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $personEmployeeType = $this->PersonEmployeeTypes->get($id, [
            'contain' => []
        ]);

        $this->UserAction->logAction(__FILE__, $personEmployeeType->id);

        $this->Ajax->sendToView($personEmployeeType);

        $this->set('personEmployeeType', $personEmployeeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $personEmployeeType = $this->PersonEmployeeTypes->newEntity();
        if ($this->request->is('post')) {
            $personEmployeeType = $this->PersonEmployeeTypes->patchEntity($personEmployeeType, $this->request->getData());
            if ($this->PersonEmployeeTypes->save($personEmployeeType)) {

                $this->UserAction->logAction(__FILE__, $personEmployeeType->id);

                $this->Flash->success(__('The person employee type has been saved.'));

                $this->Ajax->sendSuccess();
            } elseif ($this->request->is('ajax')) {
                $this->Ajax->sendErrors($personEmployeeType);
            }
            $this->Flash->error(__('The person employee type could not be saved. Please, try again.'));
        }
        $this->set(compact('personEmployeeType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person Employee Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $personEmployeeType = $this->PersonEmployeeTypes->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $personEmployeeType = $this->PersonEmployeeTypes->patchEntity($personEmployeeType, $this->request->getData());
            $dirtyFields = $personEmployeeType->getDirty();

            if ($this->PersonEmployeeTypes->save($personEmployeeType)) {
                $this->UserAction->logAction(__FILE__, $personEmployeeType->id, $dirtyFields, $personEmployeeType);

                $this->Flash->success(__('The person employee type has been saved.'));

                $this->Ajax->sendSuccess();
            } elseif ($this->request->is('ajax')) {
                $this->Ajax->sendErrors($personEmployeeType);
            }
            $this->Flash->error(__('The person employee type could not be saved. Please, try again.'));
        }
        $this->set(compact('personEmployeeType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person Employee Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $this->request->allowMethod(['post', 'ajax', 'delete']);
        $personEmployeeType = $this->PersonEmployeeTypes->get($id);
        if ($this->PersonEmployeeTypes->delete($personEmployeeType)) {
            $this->UserAction->logAction(__FILE__, $personEmployeeType->id);
            $this->Flash->success(__('The person employee type has been deleted.'));
        } else {
            $this->Flash->error(__('The person employee type could not be deleted. Please, try again.'));
        }

        $this->Ajax->sendSuccess();
    }
}
