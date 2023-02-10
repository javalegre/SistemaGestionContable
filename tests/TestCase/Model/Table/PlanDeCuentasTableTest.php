<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanDeCuentasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanDeCuentasTable Test Case
 */
class PlanDeCuentasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanDeCuentasTable
     */
    protected $PlanDeCuentas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected $fixtures = [
        'app.PlanDeCuentas',
        'app.Almacenes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('PlanDeCuentas') ? [] : ['className' => PlanDeCuentasTable::class];
        $this->PlanDeCuentas = $this->getTableLocator()->get('PlanDeCuentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->PlanDeCuentas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PlanDeCuentasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
