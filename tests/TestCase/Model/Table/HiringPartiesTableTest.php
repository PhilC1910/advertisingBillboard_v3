<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HiringPartiesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HiringPartiesTable Test Case
 */
class HiringPartiesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HiringPartiesTable
     */
    public $HiringParties;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.hiring_parties',
        'app.ref_hiring_party_types',
        'core.translates'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('HiringParties') ? [] : ['className' => HiringPartiesTable::class];
        $this->HiringParties = TableRegistry::getTableLocator()->get('HiringParties', $config);
    }
    
       public function testValidationDefaultHiringPartyDetail() {
           $data = [
         'hiring_party_details' => '',
        'hiring_party_type_code_id' => 1,
        'created' => '2018-10-05 21:40:17',
        'modified' => '2018-10-05 21:40:17',
        'ref_hiring_party_type' => 1      
         ];
           
         $hiringParty = $this->HiringParties->newEntities($data);
         $resultinError = $this->HiringParties->validator()->errors($data);
         $expectedError = [
             'hiring_party_details' => [
                 '_empty' => 'this field is empty, put someting in the field '
             ]
         ]; 
         
         $this->assertEquals($expectedError, $resultinError);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->HiringParties);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
