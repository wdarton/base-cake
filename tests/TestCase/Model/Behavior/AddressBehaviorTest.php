<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\AddressBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\AddressBehavior Test Case
 */
class AddressBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\AddressBehavior
     */
    public $Address;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->Address = new AddressBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Address);

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
