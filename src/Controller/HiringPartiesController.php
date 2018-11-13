<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * HiringParties Controller
 *
 * @property \App\Model\Table\HiringPartiesTable $HiringParties
 *
 * @method \App\Model\Entity\HiringParty[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HiringPartiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['RefHiringPartyTypes']
        ];
        $hiringParties = $this->paginate($this->HiringParties);

        $this->set(compact('hiringParties'));
    }

    /**
     * View method
     *
     * @param string|null $id Hiring Party id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hiringParty = $this->HiringParties->get($id, [
            'contain' => ['RefHiringPartyTypes']
        ]);
            
        $this->set('hiringParty', $hiringParty);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hiringParty = $this->HiringParties->newEntity();
        if ($this->request->is('post')) {
            $hiringParty = $this->HiringParties->patchEntity($hiringParty, $this->request->getData());
            if ($this->HiringParties->save($hiringParty)) {
                $this->Flash->success(__('The hiring party has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hiring party could not be saved. Please, try again.'));  
        }
                $this->loadModel('RefHiringPartyTypes');
        $refHiringPartyTypes = $this->RefHiringPartyTypes->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $refHiringPartyTypes = $refHiringPartyTypes->toArray();
        reset($refHiringPartyTypes);
        $refHiringPartyTypes_id = key($refHiringPartyTypes);

        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $hiringParties = $this->HiringParties->find('list', [
            'conditions' => ['hiring_parties.hiring_party_type_code_id' => $refHiringPartyTypes_id],
        ]);
        $refHiringPartyTypes = $this->HiringParties->RefHiringPartyTypes->find('list', ['limit' => 200]);
       
        $this->set(compact('hiringParties','hiringParty', 'refHiringPartyTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hiring Party id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hiringParty = $this->HiringParties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hiringParty = $this->HiringParties->patchEntity($hiringParty, $this->request->getData());
            if ($this->HiringParties->save($hiringParty)) {
                $this->Flash->success(__('The hiring party has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hiring party could not be saved. Please, try again.'));
        }
        
        $refHiringPartyTypes = $this->HiringParties->RefHiringPartyTypes->find('list', ['limit' => 200]);
        $this->set(compact('hiringParty', 'refHiringPartyTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hiring Party id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hiringParty = $this->HiringParties->get($id);
        if ($this->HiringParties->delete($hiringParty)) {
            $this->Flash->success(__('The hiring party has been deleted.'));
        } else {
            $this->Flash->error(__('The hiring party could not be deleted. Please, try again.'));
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
      $this->Auth->allow(['getByHiringPartyReference','display', 'view', 'index']);
    }    public function __construct(\Cake\Http\ServerRequest $request = null, \Cake\Http\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
    }
    
       public function getByHiringPartyReference() {
        $refHiringPartyTypes = $this->request->query('hiring_party_type_code_id');

        $hiring_parties = $this->HiringParties->find('all', [
            'conditions' => ['hiring_parties.hiring_party_type_code_id' => $refHiringPartyTypes],
        ]);
        $this->set('hiring_parties',   $hiring_parties);
        $this->set('_serialize', ['hiring_parties']);
    }
    
    
}
