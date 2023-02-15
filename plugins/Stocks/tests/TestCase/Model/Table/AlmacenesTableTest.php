<?php
declare(strict_types=1);

namespace Stocks\Test\TestCase\Model\Table;

use Cake\TestSuite\TestCase;
use Stocks\Model\Table\AlmacenesTable;

/**
 * Stocks\Model\Table\AlmacenesTable Test Case
 */
class AlmacenesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \Stocks\Model\Table\AlmacenesTable
     */
    protected $Almacenes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'plugin.Stocks.Almacenes',
        'plugin.Stocks.Localidades',
        'plugin.Stocks.PlanDeCuentas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Almacenes') ? [] : ['className' => AlmacenesTable::class];
        $this->Almacenes = $this->getTableLocator()->get('Almacenes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Almacenes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \Stocks\Model\Table\AlmacenesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \Stocks\Model\Table\AlmacenesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
