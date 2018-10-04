<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AjaxComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AjaxComponent Test Case
 */
class AjaxComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\AjaxComponent
     */
    public $Ajax;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Ajax = new AjaxComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ajax);

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
