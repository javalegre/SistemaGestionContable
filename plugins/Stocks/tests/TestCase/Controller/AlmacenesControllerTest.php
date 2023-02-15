<?php
declare(strict_types=1);

namespace Stocks\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;
use Stocks\Controller\AlmacenesController;

/**
 * Stocks\Controller\AlmacenesController Test Case
 *
 * @uses \Stocks\Controller\AlmacenesController
 */
class AlmacenesControllerTest extends TestCase
{
    use IntegrationTestTrait;

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
     * Test index method
     *
     * @return void
     * @uses \Stocks\Controller\AlmacenesController::index()
     */
    public function testIndex(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     * @uses \Stocks\Controller\AlmacenesController::view()
     */
    public function testView(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     * @uses \Stocks\Controller\AlmacenesController::add()
     */
    public function testAdd(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     * @uses \Stocks\Controller\AlmacenesController::edit()
     */
    public function testEdit(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     * @uses \Stocks\Controller\AlmacenesController::delete()
     */
    public function testDelete(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
