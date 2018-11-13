<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * BillboardsHired Controller
 *
 * @property \App\Model\Table\BillboardsHiredTable $BillboardsHired
 *
 * @method \App\Model\Entity\BillboardsHired[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillboardsHiredController extends AppController
{

       public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
 
    public function index()
    {
        $this->paginate = [
            'contain' => ['Billboards', 'HiringParties', 'Users']
        ];
        $billboardsHired = $this->paginate($this->BillboardsHired);

        $this->set(compact('billboardsHired'));
    }

    /**
     * View method
     *
     * @param string|null $id Billboards Hired id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billboardsHired = $this->BillboardsHired->get($id, [
            'contain' => ['Billboards', 'HiringParties', 'Users']
        ]);
             $this->viewBuilder()->options([
                'pdfConfig' => [
                    'orientation' => 'portrait',
                    'filename' => 'Billboard_hire_' . $id
                ]
            ]);
        $this->set('billboardsHired', $billboardsHired);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billboardsHired = $this->BillboardsHired->newEntity();
        if ($this->request->is('post')) {
            $billboardsHired = $this->BillboardsHired->patchEntity($billboardsHired, $this->request->getData());
            if ($this->BillboardsHired->save($billboardsHired)) {
                $this->Flash->success(__('The billboards hired has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billboards hired could not be saved. Please, try again.'));
        }
        $billboards = $this->BillboardsHired->Billboards->find('list', ['limit' => 200]);
        $hiringParties = $this->BillboardsHired->HiringParties->find('list', ['limit' => 200]);
        $users = $this->BillboardsHired->Users->find('list', ['limit' => 200]);
        $this->set(compact('billboardsHired', 'billboards', 'hiringParties', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Billboards Hired id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billboardsHired = $this->BillboardsHired->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billboardsHired = $this->BillboardsHired->patchEntity($billboardsHired, $this->request->getData());
            if ($this->BillboardsHired->save($billboardsHired)) {
                $this->Flash->success(__('The billboards hired has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billboards hired could not be saved. Please, try again.'));
        }
        $billboards = $this->BillboardsHired->Billboards->find('list', ['limit' => 200]);
        $hiringParties = $this->BillboardsHired->HiringParties->find('list', ['limit' => 200]);
        $users = $this->BillboardsHired->Users->find('list', ['limit' => 200]);
        $this->set(compact('billboardsHired', 'billboards', 'hiringParties', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Billboards Hired id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billboardsHired = $this->BillboardsHired->get($id);
        if ($this->BillboardsHired->delete($billboardsHired)) {
            $this->Flash->success(__('The billboards hired has been deleted.'));
        } else {
            $this->Flash->error(__('The billboards hired could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
