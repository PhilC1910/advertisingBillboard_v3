<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BillboardsHiredTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BillboardsHiredTable Test Case
 */
class BillboardsHiredTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BillboardsHiredTable
     */
    public $BillboardsHired;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.billboards_hired',
        'app.billboards',
        'app.hiring_parties',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('BillboardsHired') ? [] : ['className' => BillboardsHiredTable::class];
        $this->BillboardsHired = TableRegistry::getTableLocator()->get('BillboardsHired', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BillboardsHired);

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
