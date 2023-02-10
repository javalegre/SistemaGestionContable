<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConfigurationsFixture
 */
class ConfigurationsFixture extends TestFixture
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
                'system_name' => 'Lorem ipsum dolor sit amet',
                'system_abbr' => 'Lorem ipsum dolor sit amet',
                'organization_name' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'meta_title' => 'Lorem ipsum dolor sit amet',
                'meta_keyword' => 'Lorem ipsum dolor sit amet',
                'meta_desc' => 'Lorem ipsum dolor sit amet',
                'timezone' => 'Lorem ipsum dolor sit amet',
                'author' => 'Lorem ipsum dolor sit amet',
                'user_reg' => 1,
                'version' => 'Lorem ipsum dolor sit amet',
                'year' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-02-08 11:02:33',
                'modified' => '2023-02-08 11:02:33',
            ],
        ];
        parent::init();
    }
}
