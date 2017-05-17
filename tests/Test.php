<?php
/**
 * Created by PhpStorm.
 * User: petras
 * Date: 13/5/2017
 * Time: 12:16 μμ
 */
declare(strict_types=1);
use AppBundle\Entity\Product;
use PHPUnit\Framework\TestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
/**
 * @covers Email
 */
final class Test extends \Symfony\Bundle\FrameworkBundle\Test\WebTestCase
{

    /**
     * @dataProvider urlProvider
     */
    public function testIsSuccessfulUrl($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);
        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
    }

    public function testMainPage(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertContains('Shop4Dev', $client->getResponse()->getContent());
        $this->assertContains('Latest Works', $client->getResponse()->getContent());
        $this->assertContains('Some Cool Facts About Us', $client->getResponse()->getContent());
        $this->assertContains('Choose Most Suitable Plan', $client->getResponse()->getContent());
        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
        $link = $crawler
            ->filter('a:contains("Customize Your Site")') // find all links with the text "Customize Your Site"
            ->eq(0) // select the second link in the list
            ->link()
        ;

        // and click it
        $crawler = $client->click($link);
        $client = static::createClient();
    }

    public function testShop(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/shop');
        $this->assertContains('Build Your Site', $client->getResponse()->getContent());
        $this->assertContains('Categories', $client->getResponse()->getContent());
        $this->assertContains('Modules', $client->getResponse()->getContent());
        $this->assertTrue($client->getResponse()->isSuccessful(), 'response status is 2xx');
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/shop'),
            array('/login'),
            array('/register'),
            // ...
        );
    }

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }



}