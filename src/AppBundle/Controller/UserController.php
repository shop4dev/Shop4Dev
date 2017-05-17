<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Cart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function listAction()
    {
        $user = $this->getUser();

        $allCarts = $this->getDoctrine()
            ->getRepository('AppBundle:cart')
            ->findAll();


        return $this->render('main/user.html.twig', array(
            'user' => $user,
            'carts' => $allCarts,
        ));
    }
}