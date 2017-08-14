<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VipsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VipsTable Test Case
 */
class VipsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VipsTable
     */
    public $Vips;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vips',
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
        $config = TableRegistry::exists('Vips') ? [] : ['className' => 'App\Model\Table\VipsTable'];
        $this->Vips = TableRegistry::get('Vips', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vips);

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
