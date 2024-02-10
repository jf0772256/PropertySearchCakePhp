<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AmmenitiesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AmmenitiesTable Test Case
 */
class AmmenitiesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AmmenitiesTable
     */
    protected $Ammenities;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Ammenities',
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
        $config = $this->getTableLocator()->exists('Ammenities') ? [] : ['className' => AmmenitiesTable::class];
        $this->Ammenities = $this->getTableLocator()->get('Ammenities', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Ammenities);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\AmmenitiesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
