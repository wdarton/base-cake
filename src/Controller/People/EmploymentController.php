<?php
namespace App\Controller\People;

use App\Controller\AppController;

/**
 * Employment Controller
 *
 *
 * @method \App\Model\Entity\Employment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EmploymentController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Ajax');
    }

    /**
     * View method
     *
     * @param string|null $id Employment id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $employment = $this->Employment->get($id, [
            'contain' => []
        ]);

        $this->UserAction->logAction(__FILE__, $employment->id);
        $employment->label = $employment->title;

        $this->Ajax->sendToView($employment);

        $this->set('employment', $employment);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($person_id='')
    {
        $this->viewBuilder()->setLayout('ajax');
        $employment = $this->Employment->newEntity();

        $people = $this->Employment->People->find('list');
        $supervisors = $this->Employment->People->find('list', [
            'conditions' => ['supervisor' => 1]
        ]);
        $personEmployeeTypes = $this->Employment->PersonEmployeeTypes->find('list');

        if ($this->request->is('post')) {
            $employment = $this->Employment->patchEntity($employment, $this->request->getData());
            if ($this->Employment->save($employment)) {

                $this->UserAction->logAction(__FILE__, $employment->id);

                $this->Flash->success(__('The employment record has been saved.'));

                $this->Ajax->sendSuccess();

            } elseif ($this->request->is('ajax')) {
                $this->Ajax->sendErrors($employment);
            }
            $this->Flash->error(__('The employment record could not be saved. Please, try again.'));
        }
        $this->set(compact('employment', 'supervisors', 'people'));
        $this->set(compact('personEmployeeTypes'));
        $this->set('person_id', $person_id);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->viewBuilder()->setLayout('ajax');

        $employment = $this->Employment->get($id, [
            'contain' => []
        ]);
        $people = $this->Employment->People->find('list');
        $supervisors = $this->Employment->People->find('list', [
            'conditions' => ['supervisor' => 1]
        ]);
        $personEmployeeTypes = $this->Employment->PersonEmployeeTypes->find('list');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $employment = $this->Employment->patchEntity($employment, $this->request->getData());
            $dirtyFields = $employment->getDirty();

            if ($this->Employment->save($employment)) {
                $this->UserAction->logAction(__FILE__, $employment->id, $dirtyFields, $employment);

                $this->Flash->success(__('The employment record has been saved.'));

                $this->Ajax->sendSuccess();

            } elseif ($this->request->is('ajax')) {
                $this->Ajax->sendErrors($employment);
            }
            $this->Flash->error(__('The employment record could not be saved. Please, try again.'));
        }
        $this->set(compact('employment', 'supervisors', 'people'));
        $this->set(compact('personEmployeeTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Employment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'ajax', 'delete']);
        $employment = $this->Employment->get($id);
        if ($this->Employment->delete($employment)) {
            $this->UserAction->logAction(__FILE__, $employment->id);
            $this->Flash->success(__('The employment record has been deleted.'));
        } else {
            $this->Flash->error(__('The employment record could not be deleted. Please, try again.'));
        }

        $this->Ajax->sendSuccess();
    }
}
