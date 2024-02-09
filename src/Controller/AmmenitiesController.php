<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Ammenities Controller
 *
 * @property \App\Model\Table\AmmenitiesTable $Ammenities
 */
class AmmenitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Ammenities->find();
        $ammenities = $this->paginate($query);

        $this->set(compact('ammenities'));
    }

    /**
     * View method
     *
     * @param string|null $id Ammenity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ammenity = $this->Ammenities->get($id, contain: ['Properties']);
        $this->set(compact('ammenity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ammenity = $this->Ammenities->newEmptyEntity();
        if ($this->request->is('post')) {
            $ammenity = $this->Ammenities->patchEntity($ammenity, $this->request->getData());
            if ($this->Ammenities->save($ammenity)) {
                $this->Flash->success(__('The ammenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ammenity could not be saved. Please, try again.'));
        }
        $properties = $this->Ammenities->Properties->find('list', limit: 200)->all();
        $this->set(compact('ammenity', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ammenity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ammenity = $this->Ammenities->get($id, contain: ['Properties']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ammenity = $this->Ammenities->patchEntity($ammenity, $this->request->getData());
            if ($this->Ammenities->save($ammenity)) {
                $this->Flash->success(__('The ammenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ammenity could not be saved. Please, try again.'));
        }
        $properties = $this->Ammenities->Properties->find('list', limit: 200)->all();
        $this->set(compact('ammenity', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ammenity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ammenity = $this->Ammenities->get($id);
        if ($this->Ammenities->delete($ammenity)) {
            $this->Flash->success(__('The ammenity has been deleted.'));
        } else {
            $this->Flash->error(__('The ammenity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
