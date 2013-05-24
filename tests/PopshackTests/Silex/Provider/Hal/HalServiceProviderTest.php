<?php
namespace PopshackTests\Silex\Provider\Hal;

use \PHPUnit_Framework_TestCase as TestCase;
use \Silex\Application;
use \Popshack\Silex\Provider\Hal\HalServiceProvider;

class HalServiceProviderTest extends TestCase
{
    public function testServiceRegistration()
    {
        $app = new Application();
        $app->register(new HalServiceProvider());
        $this->assertInstanceOf(
            '\NoCarrier\Hal',
            $app['hal']
    }
}
