<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vips Controller
 *
 * @property \App\Model\Table\VipsTable $Vips
 */
class VipsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients']
        ];
        $vips = $this->paginate($this->Vips);

        $this->set(compact('vips'));
        $this->set('_serialize', ['vips']);
    }

    /**
     * View method
     *
     * @param string|null $id Vip id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vip = $this->Vips->get($id, [
            'contain' => ['Clients']
        ]);

        $this->set('vip', $vip);
        $this->set('_serialize', ['vip']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vip = $this->Vips->newEntity();
        if ($this->request->is('post')) {
            $vip = $this->Vips->patchEntity($vip, $this->request->data);
            if ($this->Vips->save($vip)) {
                $this->Flash->success(__('The vip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vip could not be saved. Please, try again.'));
        }
        $clients = $this->Vips->Clients->find('list', ['limit' => 200]);
        $this->set(compact('vip', 'clients'));
        $this->set('_serialize', ['vip']);

        debug($this->Vips);
        exit();
    }

    /**
     * Edit method
     *
     * @param string|null $id Vip id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vip = $this->Vips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vip = $this->Vips->patchEntity($vip, $this->request->data);
            if ($this->Vips->save($vip)) {
                $this->Flash->success(__('The vip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vip could not be saved. Please, try again.'));
        }
        $clients = $this->Vips->Clients->find('list', ['limit' => 200]);
        $this->set(compact('vip', 'clients'));
        $this->set('_serialize', ['vip']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vip id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vip = $this->Vips->get($id);
        if ($this->Vips->delete($vip)) {
            $this->Flash->success(__('The vip has been deleted.'));
        } else {
            $this->Flash->error(__('The vip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
