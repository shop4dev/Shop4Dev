<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Cart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/user", name="welcome")
     */
    public function listAction()
    {
        $user = $this->getUser();

        $allCarts = $this->getDoctrine()
            ->getRepository('AppBundle:cart')
            ->findAll();


        return $this->render('user/base.html.twig', array(
            'user' => $user,
            'all_carts' => $allCarts,
        ));
    }
}