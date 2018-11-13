<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InvoicesFiles Controller
 *
 * @property \App\Model\Table\InvoicesFilesTable $InvoicesFiles
 *
 * @method \App\Model\Entity\InvoicesFile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InvoicesFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Invoices', 'Files']
        ];
        $invoicesFiles = $this->paginate($this->InvoicesFiles);

        $this->set(compact('invoicesFiles'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoices File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoicesFile = $this->InvoicesFiles->get($id, [
            'contain' => ['Invoices', 'Files']
        ]);

        $this->set('invoicesFile', $invoicesFile);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $invoicesFile = $this->InvoicesFiles->newEntity();
        if ($this->request->is('post')) {
            $invoicesFile = $this->InvoicesFiles->patchEntity($invoicesFile, $this->request->getData());
            if ($this->InvoicesFiles->save($invoicesFile)) {
                $this->Flash->success(__('The invoices file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoices file could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoicesFiles->Invoices->find('list', ['limit' => 200]);
        $files = $this->InvoicesFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('invoicesFile', 'invoices', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoices File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoicesFile = $this->InvoicesFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoicesFile = $this->InvoicesFiles->patchEntity($invoicesFile, $this->request->getData());
            if ($this->InvoicesFiles->save($invoicesFile)) {
                $this->Flash->success(__('The invoices file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoices file could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoicesFiles->Invoices->find('list', ['limit' => 200]);
        $files = $this->InvoicesFiles->Files->find('list', ['limit' => 200]);
        $this->set(compact('invoicesFile', 'invoices', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoices File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoicesFile = $this->InvoicesFiles->get($id);
        if ($this->InvoicesFiles->delete($invoicesFile)) {
            $this->Flash->success(__('The invoices file has been deleted.'));
        } else {
            $this->Flash->error(__('The invoices file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
