<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use ErrorException;

/**
 * MachineDeployments Controller
 *
 * @property \App\Model\Table\MachineDeploymentsTable $MachineDeployments
 */
class MachineDeploymentsController extends AppController {
    
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index() {
        $this->paginate = [
            'contain' => [
                'Users',
                'Machines',
                'Origins',
                'Destinations'
            ]
        ];
        $machineDeployments = $this->paginate($this->MachineDeployments);
        
        $this->set(compact('machineDeployments'));
        $this->set('_serialize', [
            'machineDeployments'
        ]);
    }
    
    /**
     * View method
     *
     * @param string|null $id
     *            Machine Deployment id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $machineDeployment = $this->MachineDeployments->get($id, [
            'contain' => [
                'Users',
                'Machines',
                'Origins',
                'Destinations'
            ]
        ]);
        
        $this->set('machineDeployment', $machineDeployment);
        $this->set('_serialize', [
            'machineDeployment'
        ]);
    }
    
    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $machineDeployment = $this->MachineDeployments->newEntity();
        if ($this->request->is('post')) {    
            $machineDeployment = $this->MachineDeployments->patchEntity($machineDeployment, $this->request->data);
            
            $machines = TableRegistry::get('Machines');
            $machine = $machines->get($machineDeployment->machine_id);
            
            $machineDeployment->user_id = $this->Auth->user('id');
            $machineDeployment->datetime = date('Y-m-d H:i:s');
            $machineDeployment->from_warehouse = $machine->warehouse_id;
            
            try {
                if ($machineDeployment->errors())
                    throw new ErrorException('The machine deployment could not be saved. Please, try again.');
                else {
                    if ($machineDeployment->from_warehouse === $machineDeployment->to_warehouse)
                        throw new ErrorException('This machine is already in that location.');
                    if ($machine->is_active)
                        throw new ErrorException('This machine is currently in use.');
                    else {
                        $connection = ConnectionManager::get('default');
                        $machine->is_active = true;
                        $machine->warehouse_id = $machineDeployment->to_warehouse;
                        $connection->transactional(function ($conn) use ($machineDeployment, $machines, $machine) {
                            $this->MachineDeployments->save($machineDeployment);
                            $machines->save($machine);
                        });
                        $this->Flash->success(__('The machine deployment has been saved.'));
                        return $this->redirect([
                            'action' => 'index'
                        ]);
                    }
                }
            } catch (ErrorException $e) {
                $this->Flash->error($e->getMessage());
            }
        }
        $machines = $this->MachineDeployments->Machines->find('list', [
            'limit' => 200,
            'valueField' => 'title'
        ]);
        $origins = $this->MachineDeployments->Origins->find('list', [
            'limit' => 200
        ]);
        $destinations = $this->MachineDeployments->Destinations->find('list', [
            'limit' => 200
        ]);
        $this->set('available_rate_type', $this->MachineDeployments->getAvailableRateTypes());
        $this->set(compact('machineDeployment', 'users', 'machines', 'origins', 'destinations'));
        $this->set('_serialize', [
            'machineDeployment'
        ]);
    }
}
