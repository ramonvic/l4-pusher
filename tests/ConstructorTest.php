<?php

use \Ramonvic\L4Pusher\Pusher as L4Pusher;

class ConstructorTest extends PHPUnit_Framework_TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }


    public function testConstructor()
    {
        $pusher = new L4Pusher('', '', '');
        $this->assertInstanceOf('\Ramonvic\L4Pusher\Pusher', $pusher);
        $this->assertArrayHasKey('host', $pusher->getSettings());
        $this->assertArrayHasKey('scheme', $pusher->getSettings());
    }
}
