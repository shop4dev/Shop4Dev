<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cart;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ShopType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ShopController extends Controller
{
    /**
     * @Route("/shop", name="welcome")
     */
    public function listAction(Request $request)
    {
        $allCats = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        $subcategories = array();
        $modules = array();

        foreach  ($allCats as $cat)
        {
            $subcats = $cat->getSubcategories();
            $subcategories[$cat->getId()] = $subcats;
            foreach ($subcats as $prod)
            {
                $modul = $prod->getProducts();
                $modules[$prod->getId()] = $modul;
            }
        }

        $em = $this->getDoctrine()->getManager();
        $maxId = $em->createQueryBuilder()
            ->select('MAX(e.id)')
            ->from('AppBundle:Product', 'e')
            ->getQuery()
            ->getSingleScalarResult();

        $cart = new Cart();
        $form = $this->createForm(ShopType::class, $cart);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $cart->setUser($this->getUser());
            $time = new \DateTime();
            $cart->setDateCreated($time);
            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($cart);
            $em->flush();

            return $this->redirectToRoute('user');
        }

        return $this->render('main/shop.html.twig', array(
            'data' => $subcategories,
            'data2' => $modules,
            'cats' => $allCats,
            'maxId' => $maxId,
            'form' => $form->createView()
        ));
    }
}
