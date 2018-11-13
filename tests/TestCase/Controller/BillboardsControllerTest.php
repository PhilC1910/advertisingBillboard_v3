<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BillboardsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BillboardsController Test Case
 */
class BillboardsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.billboards',
        
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/BillBoards');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
          $this->get('billboards/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
          $this->get('billboards/add');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
         $this->get('billboards/edit/1');
        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
         $this->get('billboards/delete/1');
        $this->assertResponseOk();
    }
    
    public function testAddAuthenticated()
{
    // Définit des données de session
    $this->session([
        'Auth' => [
            'User' => [
                'id' => 19,
                'username' => 'admin33',
                // autres clés.
            ]
        ]
    ]);
    $this->get('/Bilboards/add');

    $this->assertResponseOk();
    // Autres assertions.
}

    public function testAddNotAuthenticated()
{
    // Définit des données de session
  $this->get('billboards/add');

       $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);
    // Autres assertions.
}
    
   /* public function testAutoComplete()
    {
  
        $this->configRequest([
            'headers' => ['Accept' => 'billboards/autocompletedemo']
        ]);
        if ($this->request->is('ajax')) {
            
            
            
        }
    }*/
}
