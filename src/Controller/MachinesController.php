<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Machines Controller
 *
 * @property \App\Model\Table\MachinesTable $Machines
 */
class MachinesController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->loadComponent('Search.Prg', ['actions' => ['index']]);
	}
	
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$query = $this->Machines
    	->find('search', ['search' => $this->request->query])
    	->contain(['Warehouses']);
    	
    	$this->set('machines', $this->paginate($query));
    }
    
    /**
     * View method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => ['Warehouses', 'MachineDeployments']
        ]);

        $this->set('machine', $machine);
        $this->set('_serialize', ['machine']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $machine = $this->Machines->newEntity();
        if ($this->request->is('post')) {
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The machine could not be saved. Please, try again.'));
            }
        }
        $warehouses = $this->Machines->Warehouses->find('list', ['limit' => 200]);
        $this->set('available_rate_types', $this->Machines->getAvailableRateTypes());
        $this->set(compact('machine', 'warehouses'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $machine = $this->Machines->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $machine = $this->Machines->patchEntity($machine, $this->request->data);
            if ($this->Machines->save($machine)) {
                $this->Flash->success(__('The machine has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The machine could not be saved. Please, try again.'));
            }
        }
        $this->set('available_rate_types', $this->Machines->getAvailableRateTypes());
        $this->set(compact('machine'));
        $this->set('_serialize', ['machine']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Machine id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $machine = $this->Machines->get($id);
        if ($this->Machines->delete($machine)) {
            $this->Flash->success(__('The machine has been deleted.'));
        } else {
            $this->Flash->error(__('The machine could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function isAuthorized($user = null) {
    	
    	if (in_array($this->request['action'], ['add', 'edit', 'delete']) && $user['role'] === 'e')
    		return parent::isAuthorized($user);
    	else
    		return true;
    }
}
