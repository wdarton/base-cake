<?php
namespace App\Test\TestCase\Model\Behavior;

use App\Model\Behavior\MySQLDateConversionBehavior;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Behavior\MySQLDateConversionBehavior Test Case
 */
class MySQLDateConversionBehaviorTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Behavior\MySQLDateConversionBehavior
     */
    public $MySQLDateConversion;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->MySQLDateConversion = new MySQLDateConversionBehavior();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MySQLDateConversion);

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
