<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use ErrorException;

/**
 * Withdrawals Controller
 *
 * @property \App\Model\Table\WithdrawalsTable $Withdrawals
 */
class WithdrawalsController extends AppController
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
        $withdrawals = $this->paginate($this->Withdrawals);

        $this->set(compact('withdrawals'));
        $this->set('_serialize', ['withdrawals']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $withdrawal = $this->Withdrawals->newEntity();
        if ($this->request->is('post')) {
            $connection = ConnectionManager::get('default');
            $withdrawal = $this->Withdrawals->patchEntity($withdrawal, $this->request->data);
            $withdrawal->user_id = $this->Auth->user('id');
            $withdrawal->datetime = date('Y-m-d H:i:s');
            try {
                if ($withdrawal->errors())
                    throw new ErrorException();
                else {
                    $inventories = TableRegistry::get('Inventories');
                    $inventory = $inventories->get($withdrawal->inventory_id);
                    $newStock = $inventory->stock - $withdrawal->quantity;
                    $inventories->patchEntity($inventory, ['stock' => $newStock]);
                    if ($inventory->errors())
                        throw new ErrorException();
                    else {
                        $connection->transactional(function ($conn) use ($withdrawal, $inventories, $inventory) {
                            $this->Withdrawals->save($withdrawal);
                            $inventories->save($inventory);
                        });
                        $this->Flash->success(__('The withdrawal has been saved.'));
                        return $this->redirect(['action' => 'index']);
                    }
                }
            } catch (ErrorException $e) {
                $this->Flash->error(__('The withdrawal could not be saved. Please, try again.'));
            }
        }
        $users = $this->Withdrawals->Users->find('list', ['limit' => 200]);
        $inventories = $this->Withdrawals->Inventories->find('list', ['limit' => 200, 'valueField' => 'title'])->contain(['Warehouses', 'Materials']);
        $this->set(compact('withdrawal', 'users', 'inventories'));
        $this->set('_serialize', ['withdrawal']);
    }
}
