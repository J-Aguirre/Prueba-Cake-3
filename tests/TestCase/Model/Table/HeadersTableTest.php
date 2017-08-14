<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeadersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeadersTable Test Case
 */
class HeadersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HeadersTable
     */
    public $Headers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.headers',
        'app.clients'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Headers') ? [] : ['className' => 'App\Model\Table\HeadersTable'];
        $this->Headers = TableRegistry::get('Headers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Headers);

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
