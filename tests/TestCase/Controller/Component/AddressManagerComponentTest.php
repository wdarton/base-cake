<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AddressManagerComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AddressManagerComponent Test Case
 */
class AddressManagerComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\AddressManagerComponent
     */
    public $AddressManager;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->AddressManager = new AddressManagerComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AddressManager);

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
