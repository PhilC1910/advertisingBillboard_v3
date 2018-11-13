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
 
  
}
