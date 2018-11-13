<?php
namespace App\Controller\Api;

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
   
    
 public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name', 'description'
        ],
*/        'sortWhitelist' => [
            'billboard_id', 'billboard_details'
        ]
    ];
 
     public function beforeFilter(\Cake\Event\Event $event){
        parent::beforeFilter($event);
        if($this->request->param('action') === 'add'){
            $this->eventManager()->off($this->Csrf);
        }
    }
    public function isAuthorized($user)
    {
        return true;  
    }
    
      public function initialize() {
        parent::initialize();
        // Set the layout.
        $this->viewBuilder()->setLayout('monopage');
    }
  
}
