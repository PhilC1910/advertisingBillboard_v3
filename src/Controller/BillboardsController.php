<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Billboards Controller
 *
 * @property \App\Model\Table\BillboardsTable $Billboards
 *
 * @method \App\Model\Entity\Billboard[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BillboardsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $billboards = $this->paginate($this->Billboards);

        
        $this->set(compact('billboards'));
    }

    /**
     * View method
     *
     * @param string|null $id Billboard id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $billboard = $this->Billboards->get($id, [
            'contain' => []
        ]);

        
        $this->set('billboard', $billboard);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $billboard = $this->Billboards->newEntity();
        if ($this->request->is('post')) {
        
            $billboard = $this->Billboards->patchEntity($billboard, $this->request->getData());
            if ($this->Billboards->save($billboard)) {
                $this->Flash->success(__('The billboard has been saved.'));

                
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billboard could not be saved. Please, try again.'));
        }
        
        $this->set(compact('billboard'));
    }
    

    /**
     * Edit method
     *
     * @param string|null $id Billboard id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $billboard = $this->Billboards->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $billboard = $this->Billboards->patchEntity($billboard, $this->request->getData());
            if ($this->Billboards->save($billboard)) {
                $this->Flash->success(__('The billboard has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The billboard could not be saved. Please, try again.'));
        }
        $this->set(compact('billboard'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Billboard id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $billboard = $this->Billboards->get($id);
        if ($this->Billboards->delete($billboard)) {
            $this->Flash->success(__('The billboard has been deleted.'));
        } else {
            $this->Flash->error(__('The billboard could not be deleted. Please, try again.'));
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
        
        $this->Auth->allow(['autocompletedemo', 'findBillboard', 'display', 'view', 'index']);
        
        
    }   
    
    public function __construct(\Cake\Http\ServerRequest $request = null, \Cake\Http\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
    
        
    }
       public function findBillboard() {
       
            if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $billboardDetails = $this->request->query['term'];
            $results = $this->Billboards->find('all', array(
                'conditions' => array('Billboards.billboard_details LIKE ' => '%' . $billboardDetails . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['billboard_details'], 'value' => $result['billboard_details']);
            }
            echo json_encode($resultArr);
        }
       
    }
     public function autocompletedemo() {
        
    }

}
