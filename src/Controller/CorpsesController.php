<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Corpses Controller
 *
 * @property \App\Model\Table\CorpsesTable $Corpses
 */
class CorpsesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Products', 'Headers']
        ];
        $corpses = $this->paginate($this->Corpses);

        $this->set(compact('corpses'));
        $this->set('_serialize', ['corpses']);
    }

    /**
     * View method
     *
     * @param string|null $id Corpse id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corpse = $this->Corpses->get($id, [
            'contain' => ['Products', 'Headers']
        ]);

        $this->set('corpse', $corpse);
        $this->set('_serialize', ['corpse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corpse = $this->Corpses->newEntity();
        if ($this->request->is('post')) {
            $corpse = $this->Corpses->patchEntity($corpse, $this->request->data);
            if ($this->Corpses->save($corpse)) {
                $this->Flash->success(__('The corpse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corpse could not be saved. Please, try again.'));
        }
        $products = $this->Corpses->Products->find('list', ['limit' => 200]);
        $headers = $this->Corpses->Headers->find('list', ['limit' => 200]);
        $this->set(compact('corpse', 'products', 'headers'));
        $this->set('_serialize', ['corpse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Corpse id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corpse = $this->Corpses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corpse = $this->Corpses->patchEntity($corpse, $this->request->data);
            if ($this->Corpses->save($corpse)) {
                $this->Flash->success(__('The corpse has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corpse could not be saved. Please, try again.'));
        }
        $products = $this->Corpses->Products->find('list', ['limit' => 200]);
        $headers = $this->Corpses->Headers->find('list', ['limit' => 200]);
        $this->set(compact('corpse', 'products', 'headers'));
        $this->set('_serialize', ['corpse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Corpse id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corpse = $this->Corpses->get($id);
        if ($this->Corpses->delete($corpse)) {
            $this->Flash->success(__('The corpse has been deleted.'));
        } else {
            $this->Flash->error(__('The corpse could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
