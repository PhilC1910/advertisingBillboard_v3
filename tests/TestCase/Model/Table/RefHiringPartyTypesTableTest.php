<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefHiringPartyTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefHiringPartyTypesTable Test Case
 */
class RefHiringPartyTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RefHiringPartyTypesTable
     */
    public $RefHiringPartyTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ref_hiring_party_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RefHiringPartyTypes') ? [] : ['className' => RefHiringPartyTypesTable::class];
        $this->RefHiringPartyTypes = TableRegistry::getTableLocator()->get('RefHiringPartyTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefHiringPartyTypes);

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
}
