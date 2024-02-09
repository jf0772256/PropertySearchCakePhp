<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Amenities Controller
 *
 * @property \App\Model\Table\AmenitiesTable $Amenities
 */
class AmenitiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Amenities->find();
        $amenities = $this->paginate($query);

        $this->set(compact('amenities'));
    }

    /**
     * View method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $amenity = $this->Amenities->get($id, contain: ['Properties']);
        $this->set(compact('amenity'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $amenity = $this->Amenities->newEmptyEntity();
        if ($this->request->is('post')) {
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->getData());
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success(__('The amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amenity could not be saved. Please, try again.'));
        }
        $properties = $this->Amenities->Properties->find('list', limit: 200)->all();
        $this->set(compact('amenity', 'properties'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $amenity = $this->Amenities->get($id, contain: ['Properties']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $amenity = $this->Amenities->patchEntity($amenity, $this->request->getData());
            if ($this->Amenities->save($amenity)) {
                $this->Flash->success(__('The amenity has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The amenity could not be saved. Please, try again.'));
        }
        $properties = $this->Amenities->Properties->find('list', limit: 200)->all();
        $this->set(compact('amenity', 'properties'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Amenity id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $amenity = $this->Amenities->get($id);
        if ($this->Amenities->delete($amenity)) {
            $this->Flash->success(__('The amenity has been deleted.'));
        } else {
            $this->Flash->error(__('The amenity could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
