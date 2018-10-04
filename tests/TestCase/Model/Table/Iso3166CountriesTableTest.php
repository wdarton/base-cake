<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Iso3166CountriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Iso3166CountriesTable Test Case
 */
class Iso3166CountriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\Iso3166CountriesTable
     */
    public $Iso3166Countries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.iso3166_countries'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Iso3166Countries') ? [] : ['className' => Iso3166CountriesTable::class];
        $this->Iso3166Countries = TableRegistry::get('Iso3166Countries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Iso3166Countries);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
