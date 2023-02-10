<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PlanDeCuentasFixture
 */
class PlanDeCuentasFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'CuentaPadre' => 1,
                'Nivel' => 1,
                'SaldoAnterior' => 1.5,
                'Debe' => 1.5,
                'Haber' => 1.5,
                'Saldo' => 1.5,
                'TipoCuenta' => 1,
                'Indent' => 1,
                'Imprescindible' => 1,
                'Presupuestado' => 1,
            ],
        ];
        parent::init();
    }
}
