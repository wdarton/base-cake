<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\UserActionComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\UserActionComponent Test Case
 */
class UserActionComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\UserActionComponent
     */
    public $UserAction;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->UserAction = new UserActionComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserAction);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
