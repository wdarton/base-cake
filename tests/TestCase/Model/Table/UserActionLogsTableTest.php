<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserActionLogsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserActionLogsTable Test Case
 */
class UserActionLogsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserActionLogsTable
     */
    public $UserActionLogs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_action_logs',
        'app.users',
        'app.aros',
        'app.acos',
        'app.permissions',
        'app.people',
        'app.person_private_equities',
        'app.user_groups',
        'app.user_roles',
        'app.entities'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('UserActionLogs') ? [] : ['className' => UserActionLogsTable::class];
        $this->UserActionLogs = TableRegistry::get('UserActionLogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserActionLogs);

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
