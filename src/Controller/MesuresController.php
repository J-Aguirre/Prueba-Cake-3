<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mesures Controller
 *
 * @property \App\Model\Table\MesuresTable $Mesures
 */
class MesuresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $mesures = $this->paginate($this->Mesures);

        $this->set(compact('mesures'));
        $this->set('_serialize', ['mesures']);
    }

    /**
     * View method
     *
     * @param string|null $id Mesure id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mesure = $this->Mesures->get($id, [
            'contain' => []
        ]);

        $this->set('mesure', $mesure);
        $this->set('_serialize', ['mesure']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mesure = $this->Mesures->newEntity();
        if ($this->request->is('post')) {
            $mesure = $this->Mesures->patchEntity($mesure, $this->request->data);
            if ($this->Mesures->save($mesure)) {
                $this->Flash->success(__('The mesure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mesure could not be saved. Please, try again.'));
        }
        $this->set(compact('mesure'));
        $this->set('_serialize', ['mesure']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mesure id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mesure = $this->Mesures->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mesure = $this->Mesures->patchEntity($mesure, $this->request->data);
            if ($this->Mesures->save($mesure)) {
                $this->Flash->success(__('The mesure has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The mesure could not be saved. Please, try again.'));
        }
        $this->set(compact('mesure'));
        $this->set('_serialize', ['mesure']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mesure id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mesure = $this->Mesures->get($id);
        if ($this->Mesures->delete($mesure)) {
            $this->Flash->success(__('The mesure has been deleted.'));
        } else {
            $this->Flash->error(__('The mesure could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
