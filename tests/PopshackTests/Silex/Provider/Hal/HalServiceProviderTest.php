<?php
/**
 * Tests for HAL provider
*
* PHP version 5.3
*
* @category   Tests
* @package    Popshack
* @subpackage Silex
* @author     Popshack
* @copyright  2013 Popshack. All rights reserved.
* @license    MIT http://opensource.org/licenses/MIT
* @link       https://github.com/PopShack/silex-hal-serviceprovider
*/
namespace PopshackTests\Silex\Provider\Hal;

use \PHPUnit_Framework_TestCase as TestCase;
use \Silex\Application;
use \Popshack\Silex\Provider\Hal\HalServiceProvider;

/**
 * Tests for HAL provider
 *
 * PHP version 5.3
 *
 * @category   Tests
 * @package    Popshack
 * @subpackage Silex
 * @author     Popshack
 * @copyright  2013 Popshack. All rights reserved.
 * @license    MIT http://opensource.org/licenses/MIT
 * @link       https://github.com/PopShack/silex-hal-serviceprovider
 */
class HalServiceProviderTest extends TestCase
{
    /**
     * @test
     * @covers Popshack\Silex\Provider\Hal\HalServiceProvider::__construct
     * @covers Popshack\Silex\Provider\Hal\HalServiceProvider::register
     */
    public function testServiceRegistration()
    {
        $app = new Application();
        $app->register(new HalServiceProvider());
        $uri = '/orders';
        $data = array(
            'total' => 30.00,
            'currency' => 'USD',
        );
        $hal = $app['hal']($uri, $data);
        $this->assertInstanceOf(
            '\NoCarrier\Hal',
            $hal
        );
        $this->assertEquals($uri, $hal->getUri());
        $this->assertEquals($data, $hal->getData());
    }
}
