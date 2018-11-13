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
class AproposController extends AppController
{
    
     public function index()
    {
         
        $this->set(compact('Apropos'));
    }
    
    
    
}

