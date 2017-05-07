<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ShopController extends Controller
{
    /**
     * @Route("/shop", name="shop")
     */
    public function listAction()
    {
        $allCats = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        $data = array();

        foreach  ($allCats as $cats)
        {
            $products = $cats->getProducts();
            $data[$cats->getId()] = $products;
        }

        return $this->render('main/shop.html.twig', array(
            'data' => $data,
            'cats' => $allCats
        ));
    }
}
