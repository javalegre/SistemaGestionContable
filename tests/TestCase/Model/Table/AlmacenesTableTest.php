<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AlmacenesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AlmacenesTable Test Case
 */
class AlmacenesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AlmacenesTable
     */
    protected $Almacenes;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.Almacenes',
        'app.Localidades',
        'app.PlanDeCuentas',
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
     * @uses \App\Model\Table\AlmacenesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\AlmacenesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
