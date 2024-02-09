<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * AmmenitiesFixture
 */
class AmmenitiesFixture extends TestFixture
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
                'created' => '2024-02-09 13:23:21',
                'modified' => '2024-02-09 13:23:21',
            ],
        ];
        parent::init();
    }
}
