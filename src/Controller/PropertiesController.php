<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\PropertySearchForm;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Properties->find();
        $properties = $this->paginate($query);

        $this->set(compact('properties'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id);
        $this->set(compact('property'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $amenities = $this->Properties->Amenities->find('list', limit: 200)->all();
        $this->set(compact('property', 'amenities'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $property = $this->Properties->get($id, contain: ['Amenities']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $property = $this->Properties->patchEntity($property, $this->request->getData());
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property could not be saved. Please, try again.'));
        }
        $amenities = $this->Properties->Amenities->find('list', limit: 200)->all();
        $this->set(compact('property', 'amenities'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function search()
    {
        /**
         * Process here is to take the form data, filter out the unselected options then do work on the values to get them to properly be used in the where clause.
         * If no data was passed like in the initial page load, we need to show all properties.
         */


        $searchForm = new PropertySearchForm();
        $query = $this->Properties->find();
        if ($searchForm->execute($this->request->getData()))
        {
            // if beds is 0 then set beds to null
            $beds = ((int) $this->request->getData()['beds'] > 0 ? (int) $this->request->getData()['beds'] : null);
            // if baths is 0 then set baths to null
            $baths = ((int) $this->request->getData()['baths'] > 0 ? (int) $this->request->getData()['baths'] : null);
            // strip any lt gt eq chars from the value passed
            $price = str_ireplace(['<','>','='],['','',''],$this->request->getData()['price']);
            // break into an array using - as the separator in ranges
            $price = explode('-', $price);
            // trim whitespace from the last element in price array and set value to a variable
            $high = trim($price[count($price) - 1]);
            // trim whitespace from the first element in price array and set value to a variable
            $low = trim($price[0]);
            // check if low and high values are the same, then check for the presence of k for thousands, or m for millions, and set teh specialOp variable to < > or null if false
            $specialOp = $high == $low && str_contains($low, 'k') ? '<' : ($high == $low && str_contains($low, 'm') ? '>' : null);
            // now we take and replace k and m on high and low values with the correct number of '0', and then cast to integer
            $high = (int) str_ireplace(['k','m'], ['000','000000'], $high);
            $low = (int) str_ireplace(['k','m'], ['000','000000'], $low);
            // based on specialOp variable set either high or low to null if specialOp is not empty.
            if (!empty($specialOp) && $specialOp==='<') $high = null;
            if (!empty($specialOp) && $specialOp==='>') $low = null;
            // build the where clause array
            $whereClause = [];
            // Add where clause where values are set for beds, baths and if specialOp is set, beds and baths are set to be exact, but could easily be added to be >= as well
            // I chose exact for the fact that teh base data set has 3 properties in it that I was testing with.
            if ($baths !== null) $whereClause['baths ='] = $baths;
            if ($beds !== null) $whereClause['beds ='] = $beds;
            if ($specialOp === '<') $whereClause['price <'] = $low;
            if ($specialOp === '>') $whereClause['price >'] = $high;
            // Apply where clause to query
            $query->where($whereClause);
            // if price range was selected and specialOp is null then create a and where price is between low and high.
            if ($specialOp===null && $low > 0 && $high > 0) $query->andWhere(function ($exp, $q) use ($low, $high)
            {
                return $exp->between('price', $low, $high);
            });
        }
        // Paginate the results
        $properties = $this->paginate($query);
        // return to view
        $this->set(compact('properties', 'searchForm'));
    }
}
