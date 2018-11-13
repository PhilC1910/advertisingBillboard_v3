<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RefHiringPartyTypes Controller
 *
 * @property \App\Model\Table\RefHiringPartyTypesTable $RefHiringPartyTypes
 *
 * @method \App\Model\Entity\RefHiringPartyType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RefHiringPartyTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $refHiringPartyTypes = $this->paginate($this->RefHiringPartyTypes);

        $this->set(compact('refHiringPartyTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Ref Hiring Party Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $refHiringPartyType = $this->RefHiringPartyTypes->get($id, [
            'contain' => []
        ]);

        $this->set('refHiringPartyType', $refHiringPartyType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $refHiringPartyType = $this->RefHiringPartyTypes->newEntity();
        if ($this->request->is('post')) {
            $refHiringPartyType = $this->RefHiringPartyTypes->patchEntity($refHiringPartyType, $this->request->getData());
            if ($this->RefHiringPartyTypes->save($refHiringPartyType)) {
                $this->Flash->success(__('The ref hiring party type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref hiring party type could not be saved. Please, try again.'));
        }
        $this->set(compact('refHiringPartyType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ref Hiring Party Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $refHiringPartyType = $this->RefHiringPartyTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $refHiringPartyType = $this->RefHiringPartyTypes->patchEntity($refHiringPartyType, $this->request->getData());
            if ($this->RefHiringPartyTypes->save($refHiringPartyType)) {
                $this->Flash->success(__('The ref hiring party type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ref hiring party type could not be saved. Please, try again.'));
        }
        $this->set(compact('refHiringPartyType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ref Hiring Party Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $refHiringPartyType = $this->RefHiringPartyTypes->get($id);
        if ($this->RefHiringPartyTypes->delete($refHiringPartyType)) {
            $this->Flash->success(__('The ref hiring party type has been deleted.'));
        } else {
            $this->Flash->error(__('The ref hiring party type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
          public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        $role = $user['role_id'];
      
        $verifier = $user['verifies'];
        
      if ($role === "client") {
            if(in_array($action, ['display', 'view', 'index'])){
                 return true;
            } else {
                return false;
            }
        }
        
       
        if($role === "agent de marketing"   ){
           
            if(in_array($action, ['edit','display', 'view', 'index']) && $verifier) {
                return true;
            } else {
                return false;
            }
        }
        
        if($role === "admin" ){
            if(in_array($action, ['delete','add','edit','display', 'view', 'index'])&& $verifier) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['display', 'view', 'index']);
    }    public function __construct(\Cake\Http\ServerRequest $request = null, \Cake\Http\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
    }
}
