<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserLoginsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserLoginsTable Test Case
 */
class UserLoginsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserLoginsTable
     */
    public $UserLogins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_logins',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.people',
        'app.person_private_equities',
        'app.user_groups',
        'app.user_roles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserLogins') ? [] : ['className' => UserLoginsTable::class];
        $this->UserLogins = TableRegistry::get('UserLogins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserLogins);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
