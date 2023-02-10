<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * LocalidadesFixture
 */
class LocalidadesFixture extends TestFixture
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
                'CP' => 'Lorem ipsum dolor sit amet',
                'provincia_id' => 1,
            ],
        ];
        parent::init();
    }
}
