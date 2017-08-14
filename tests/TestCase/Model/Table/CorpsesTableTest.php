<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CorpsesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CorpsesTable Test Case
 */
class CorpsesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CorpsesTable
     */
    public $Corpses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.corpses',
        'app.products',
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
        $config = TableRegistry::exists('Corpses') ? [] : ['className' => 'App\Model\Table\CorpsesTable'];
        $this->Corpses = TableRegistry::get('Corpses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Corpses);

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
