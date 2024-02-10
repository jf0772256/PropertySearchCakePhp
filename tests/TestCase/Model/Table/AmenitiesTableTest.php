<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmenitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmenitiesTable Test Case
 */
class AmenitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AmenitiesTable
     */
    protected $Amenities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Amenities',
        'app.Properties',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Amenities') ? [] : ['className' => AmenitiesTable::class];
        $this->Amenities = $this->getTableLocator()->get('Amenities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Amenities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AmenitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
