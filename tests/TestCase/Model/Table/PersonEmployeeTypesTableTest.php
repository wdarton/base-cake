<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PersonEmployeeTypesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PersonEmployeeTypesTable Test Case
 */
class PersonEmployeeTypesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PersonEmployeeTypesTable
     */
    public $PersonEmployeeTypes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.person_employee_types'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PersonEmployeeTypes') ? [] : ['className' => PersonEmployeeTypesTable::class];
        $this->PersonEmployeeTypes = TableRegistry::get('PersonEmployeeTypes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PersonEmployeeTypes);

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
