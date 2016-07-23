<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use ErrorException;

/**
 * Deposits Controller
 *
 * @property \App\Model\Table\DepositsTable $Deposits
 */
class DepositsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Inventories', 'Inventories.Warehouses', 'Inventories.Materials']
        ];
        $deposits = $this->paginate($this->Deposits);

        $this->set(compact('deposits'));
        $this->set('_serialize', ['deposits']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $deposit = $this->Deposits->newEntity();
        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $deposit = $this->Deposits->patchEntity($deposit, $this->request->data);
            $deposit->user_id = $this->Auth->user('id');
            $deposit->datetime = date('Y-m-d H:i:s');
            try {
                if ($deposit->errors())
                    throw new ErrorException();
                else {
                    $inventories = TableRegistry::get('Inventories');
                    $inventory = $inventories->get($deposit->inventory_id);
                    $newStock = $inventory->stock + $deposit->quantity;
                    $inventories->patchEntity($inventory, ['stock' => $newStock]);
                    if ($inventory->errors())
                        throw new ErrorException();
                    else {
                        $connection->transactional(function ($conn) use ($deposit, $inventories, $inventory) {
                            $this->Deposits->save($deposit);
                            $inventories->save($inventory);
                        });
                        $this->Flash->success(__('The deposit has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            } catch (ErrorException $e) {
                $this->Flash->error(__('The deposit could not be saved. Please, try again.'));
            }            
        }        
        $users = $this->Deposits->Users->find('list', ['limit' => 200]);
        $inventories = $this->Deposits->Inventories->find('list', ['limit' => 200, 'valueField' => 'title'])->contain(['Warehouses', 'Materials']);
        $this->set(compact('deposit', 'users', 'inventories'));
        $this->set('_serialize', ['deposit']);
    }
}
