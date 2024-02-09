<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AmenitiesFixture
 */
class AmenitiesFixture extends TestFixture
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
                'ammenity' => 'Lorem ipsum dolor sit amet',
                'created' => '2024-02-09 14:03:24',
                'modified' => '2024-02-09 14:03:24',
            ],
        ];
        parent::init();
    }
}
