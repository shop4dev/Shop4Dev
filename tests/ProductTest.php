<?php
/**
 * Created by PhpStorm.
 * User: petras
 * Date: 13/5/2017
 * Time: 1:23 μμ
 */

use AppBundle\Entity\Cart;
use AppBundle\Entity\Product;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectManager;
use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase
{
    public function testProductPrice()
    {
        $cart = $this->createMock(Cart::class);

        $product1 = new Product();
        $product2 = new Product();
        $product1->setName("Compenent1");
        $product1->setDescription("Description");
        $product1->setPrice(100);

        $product2->setName("Compenent2");
        $product2->setDescription("Description2");
        $product2->setPrice(200);

        $productArray = array();
        array_push($productArray, $product1);
        array_push($productArray, $product2);


        $cart->expects($this->once())
            ->method('calculateTotalPrice')
            ->will($this->returnValue(300));

        $check = $cart->calculateTotalPrice();
        $this->assertEquals(300, $check);
    }
}