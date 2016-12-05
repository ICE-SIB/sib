<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventories Controller
 *
 * @property \App\Model\Table\InventoriesTable $Inventories
 */
class InventoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Materials', 'Warehouses']
        ];
        $inventories = $this->paginate($this->Inventories);

        $this->set(compact('inventories'));
        $this->set('_serialize', ['inventories']);
    }

    /**
     * View method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inventory = $this->Inventories->get($id, [
            'contain' => ['Materials', 'Warehouses', 'Deposits', 'Withdrawals']
        ]);

        $this->set('inventory', $inventory);
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inventory = $this->Inventories->newEntity();
        if ($this->request->is('post')) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
            $inventory->stock = 0;
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $materials = $this->Inventories->Materials->find('list', ['limit' => 200]);
        $warehouses = $this->Inventories->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'materials', 'warehouses'));
        $this->set('_serialize', ['inventory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inventory id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inventory = $this->Inventories->get($id, [
            'contain' => ['Materials', 'Warehouses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inventory = $this->Inventories->patchEntity($inventory, $this->request->data);
            if ($this->Inventories->save($inventory)) {
                $this->Flash->success(__('The inventory has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The inventory could not be saved. Please, try again.'));
            }
        }
        $materials = $this->Inventories->Materials->find('list', ['limit' => 200]);
        $warehouses = $this->Inventories->Warehouses->find('list', ['limit' => 200]);
        $this->set(compact('inventory', 'materials', 'warehouses'));
        $this->set('_serialize', ['inventory']);
    }
    
    public function isAuthorized($user = null) {
    	 
    	if (in_array($this->request['action'], ['add', 'edit']) && $user['role'] === 'e')
    		return parent::isAuthorized($user);
    	else		
    		return true;
    }
}
