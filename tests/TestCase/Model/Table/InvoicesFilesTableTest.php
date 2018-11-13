<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvoicesFilesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvoicesFilesTable Test Case
 */
class InvoicesFilesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvoicesFilesTable
     */
    public $InvoicesFiles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.invoices_files',
        'app.invoices',
        'app.files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('InvoicesFiles') ? [] : ['className' => InvoicesFilesTable::class];
        $this->InvoicesFiles = TableRegistry::getTableLocator()->get('InvoicesFiles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->InvoicesFiles);

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
