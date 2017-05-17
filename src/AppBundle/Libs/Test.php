<?php

namespace AppBundle\Libs;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class Test extends WebTestCase {

    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = self::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/shop'),
            // ...
        );
    }
}