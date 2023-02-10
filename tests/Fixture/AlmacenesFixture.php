<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AlmacenesFixture
 */
class AlmacenesFixture extends TestFixture
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
                'direccion' => 'Lorem ipsum dolor sit amet',
                'codigo_postal' => 'Lorem ip',
                'localidade_id' => 1,
                'plan_de_cuenta_id' => 1,
                'predeterminado' => 1,
                'observaciones' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
                'geo_posicion' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-02-06 18:52:05',
                'modified' => '2023-02-06 18:52:05',
                'deleted' => '2023-02-06 18:52:05',
            ],
        ];
        parent::init();
    }
}
