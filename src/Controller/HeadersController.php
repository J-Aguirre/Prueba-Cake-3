<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Headers Controller
 *
 * @property \App\Model\Table\HeadersTable $Headers
 */
class HeadersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clients', 'Corpses']
        ];
        $headers = $this->paginate($this->Headers);
        $this->set(compact('headers'));
        $this->set('_serialize', ['headers']);
    }

    /**
     * View method
     *
     * @param string|null $id Header id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function view2($filename) {

        $this->viewBuilder()
            ->className('Dompdf.Pdf')
            ->layout('Dompdf.default')
            ->options(['config' => [
                'filename' => $filename,
                'render' => 'browser',
            ]]);
    }

    public function view($id = null)
    {
        $header = $this->Headers->get($id, [
            'contain' => ['Clients', 'Corpses', 'Corpses.Products', 'Corpses.Mesures']
        ]);
        /*foreach ($header->corpses as $key=>$value){
            echo $header->corpses[$key]->products['name'].' ';
        }*/

        $this->set('header', $header);
        $this->set('_serialize', ['header']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $header = $this->Headers->newEntity();
        //debug($this->request->params['pass']);
        if ($this->request->is('post')) {
            $header = $this->Headers->patchEntity($header, $this->request->data);
            if ($result = $this->Headers->save($header)) {
                $header_id = $result->id;
                foreach ($this->request->data['Corpses'] as $key => $value) {
                    $this->request->data['Corpses'][$key]['header_id'] = $header_id;
                }
                debug($this->request->data);
                $this->Flash->success(__('The header has been saved.'));
                $CorpsesTable = TableRegistry::get('Corpses');
                //debug($CorpsesTable->newEntities($this->request->data['Corpses']));
                //end();
                $corpses = $CorpsesTable->newEntities($this->request->data['Corpses']);
                if ($result = $CorpsesTable->saveMany($corpses)){
                    //save
                }
                else{
                    //error
                }

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The header could not be saved. Please, try again.'));
        }
        $ProductsTable = TableRegistry::get('Products');

        $clients = $this->Headers->Clients->find('list', ['limit' => 200]);
        $mesures = $this->Headers->Corpses->Mesures->find('list')->where(['state =' => 1]);
        $number_corpses = 1;
        if($this->request->params['pass']){
            $number_corpses = $this->request->params['pass'][0];
        }
        $products = $ProductsTable->find('list');

        $this->set(compact('header', 'clients', 'products', 'number_corpses', 'mesures'));
        //$this->set('products', $products);
        //$this->set('type_payments', $type_payments);
        $this->set('_serialize', ['header']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Header id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $header = $this->Headers->get($id, [
            'contain' => ['Corpses', 'Corpses.Products', 'Corpses.Mesures']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $header = $this->Headers->patchEntity($header, $this->request->data);
            if ($this->Headers->save($header)) {
                $this->Flash->success(__('The header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The header could not be saved. Please, try again.'));
        }
        $clients = $this->Headers->Clients->find('list', ['limit' => 200]);
        //$corpses = $this->Headers->Corpses->find('list')->where(['header_id =' => $id]);
        $products = $this->Headers->Corpses->Products->find('list');
        $mesures = $this->Headers->Corpses->Mesures->find('list');
        debug($header);
        $this->set(compact('header', 'clients', 'products', 'mesures'));//, 'corpses'));
        $this->set('_serialize', ['header']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Header id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $header = $this->Headers->get($id);
        if ($this->Headers->delete($header)) {
            $this->Flash->success(__('The header has been deleted.'));
        } else {
            $this->Flash->error(__('The header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
