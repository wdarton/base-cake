<?php
namespace App\Controller\People;

use App\Controller\AppController;
use Cake\ORM\Table;

/**
 * People Controller
 *
 * @property \App\Model\Table\PeopleTable $People
 *
 * @method \App\Model\Entity\Person[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PeopleController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Addresses');
        $this->loadModel('Iso3166Countries');
        $this->loadModel('Employment');
        $this->loadComponent('AddressManager');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->UserAction->logAction(__FILE__);

        $people = $this->People->find('all');

        $this->set(compact('people'));
    }

    /**
     * View method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $person = $this->People->get($id, [
            'contain' => ['Users', 'Addresses'],
        ]);

        $employment_history = $this->People->Employment->find('all', [
            'conditions' => ['person_id' => $id],
            'contain' => ['People', 'PersonEmployeeTypes'],
        ]);
        $employment = [];
        foreach ($employment_history as $employment_item) {
            $employment_item->supervisor = $this->People->get($employment_item->supervisor_person_id);
            $employment[] = $employment_item;
        }

        $person = $this->AddressManager->getCountry($person);

        $this->set('person', $person);
        $this->set('employment', $employment);

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $person = $this->People->newEntity();
        $person = $this->AddressManager->getCountriesList($person);

        if ($this->request->is('post')) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            $person->address_id = $this->AddressManager->newAddress($this->request->getData());

            if ($this->People->save($person)) {
                $this->UserAction->logAction(__FILE__, $person->id);

                $this->Flash->success(__('The person has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The person could not be saved. Please, try again.'));
        }
        $personPrivateEquities = $this->People->PersonPrivateEquities->find('list', ['limit' => 200]);
        $this->set(compact('person'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $person = $this->People->get($id, [
            'contain' => ['Addresses'],
        ]);
        $address = $this->Addresses->get($person->address_id);
        $person = $this->AddressManager->getCountriesList($person);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $person = $this->People->patchEntity($person, $this->request->getData());
            $address = $this->Addresses->patchEntity($address, $this->request->getData());

            if ($this->Addresses->save($address)) {
                $personDirtyFields = $person->getDirty();
                $addressDirtyFields = $address->getDirty();

                if ($this->People->save($person)) {

                    $this->UserAction->logAction(__FILE__, $id, $personDirtyFields, $person);
                    $this->UserAction->logAddress(__FILE__, $address->id, $addressDirtyFields, $address);

                    $this->Flash->success(__('The person has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('The person could not be saved. Please, try again.'));
            }
        }
        $personPrivateEquities = $this->People->PersonPrivateEquities->find('list', ['limit' => 200])->toArray();
        $this->set(compact('person'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Person id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->UserAction->logAction(__FILE__, $id);

        $this->request->allowMethod(['post', 'delete']);
        $person = $this->People->get($id);
        if ($this->People->delete($person)) {
            $this->Flash->success(__('The person has been deleted.'));
        } else {
            $this->Flash->error(__('The person could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
