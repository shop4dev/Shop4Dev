<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cart;
use AppBundle\Entity\Category;
use AppBundle\Entity\Subcategory;
use AppBundle\Entity\Product;
use AppBundle\Entity\User;
use AppBundle\Form\ProductType;
use AppBundle\Form\CategoryType;
use AppBundle\Form\SubcategoryType;
use AppBundle\Form\AdminUserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/admin", name="admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/", name="product")
     */
    public function adminAction()
    {
        $products = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->findAll();

        return $this->render('admin/product/index.html.twig', [

            'products' => $products
        ]);
    }

    /**
     * @Route("/product/create", name="product_create")
     */
    public function createAction( Request $request)
    {
        $product = new Product();

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($product);

        if($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData();
            $price= $form['price']->getData();
            $description= $form['description']->getData();

            $img = $product->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('product_directory'),
                $fileName
            );

            $category = $form['subcategory']->getData();

            $product->setName($name);
            $product->setPrice($price);
            $product->setDescription($description);
            $product->setImg($fileName);
            $product->setSubcategory($category);

            $em = $this->getDoctrine()->getManager();

            $em->persist($product);
            $em->flush();

            $this->addFlash(
                'notice',
                'Product Added'
            );

            return $this->redirect($this->generateUrl('product'));
        }

        return $this->render('admin/product/create_product.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));

    }

    /**
     * @Route("/product/edit/{id}", name="product_edit")
     */
    public function editAction($id, Request $request)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($id);

        $product->setName($product->getName());
        $product->setPrice($product->getPrice());
        $product->setDescription($product->getDescription());
        $product->setImg($product->getImg());

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($product);

        if($form->isSubmitted() && $form->isValid())
        {
            //Get Date
            $name = $form['name']->getData();
            $price= $form['price']->getData();
            $description= $form['description']->getData();

            $img = $product->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('product_directory'),
                $fileName
            );

            $category = $form['subcategory']->getData();

            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('AppBundle:Product')->find($id);

            $product->setName($name);
            $product->setPrice($price);
            $product->setDescription($description);
            $product->setImg($fileName);
            $product->setSubcategory($category);

            $em->flush();

            $this->addFlash(
                'notice',
                'Product Changed'
            );

            return $this->redirect($this->generateUrl('product'));
        }

        return $this->render('admin/product/edit.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * @Route("/product/delete/{id}", name="product_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->find($id);

        $em->remove($product);
        $em->flush();

        $this->addFlash(
            'notice',
            'Product Removed'
        );

        return $this->redirectToRoute('product');
    }

    /**
     * @Route("/category", name="category")
     */
    public function adminCategoryAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        return $this->render('admin/category/index.html.twig', [

            'categories' => $categories
        ]);
    }

    /**
     * @Route("/category/create", name="category_create")
     */
    public function createCategoryAction( Request $request)
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($category);

        if($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData();

            $img = $category->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('category_directory'),
                $fileName
            );

            $category->setName($name);
            $category->setImg($fileName);

            $em = $this->getDoctrine()->getManager();

            $em->persist($category);
            $em->flush();

            $this->addFlash(
                'notice',
                'Category Added'
            );

            return $this->redirect($this->generateUrl('category'));
        }

        return $this->render('admin/category/create_category.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));

    }

    /**
     * @Route("/category/edit/{id}", name="category_edit")
     */
    public function editCategoryAction($id, Request $request)
    {
        $category = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->find($id);

        $category->setName($category->getName());
        $category->setImg($category->getImg());

        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($category);

        if($form->isSubmitted() && $form->isValid())
        {
            //Get Date
            $name = $form['name']->getData();

            $img = $category->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('category_directory'),
                $fileName
            );


            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('AppBundle:Category')->find($id);

            $category->setName($name);
            $category->setImg($fileName);

            $em->flush();

            $this->addFlash(
                'notice',
                'Category Changed'
            );

            return $this->redirect($this->generateUrl('category'));
        }

        return $this->render('admin/category/edit.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * @Route("/category/delete/{id}", name="category_delete")
     */
    public function deleteCategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('AppBundle:Category')->find($id);

        $em->remove($category);
        $em->flush();

        $this->addFlash(
            'notice',
            'Category Removed'
        );

        return $this->redirectToRoute('category');
    }

    /**
     * @Route("/subcategory", name="subcategory")
     */
    public function adminSubcategoryAction()
    {
        $subcategories = $this->getDoctrine()
            ->getRepository('AppBundle:Subcategory')
            ->findAll();

        return $this->render('admin/subcategory/index.html.twig', [

            'subcategories' => $subcategories,
        ]);
    }

    /**
     * @Route("/subcategory/create", name="subcategory_create")
     */
    public function createSubcategoryAction( Request $request)
    {
        $subcategory = new Subcategory();

        $categories = $this->getDoctrine()
            ->getRepository('AppBundle:Category')
            ->findAll();

        $form = $this->createForm(SubcategoryType::class, $subcategory);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($subcategory);

        if($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData();
            $category = $form['category']->getData();

            $img = $subcategory->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('subcategory_directory'),
                $fileName
            );

            $subcategory->setName($name);

            $cat = $subcategory->getCategory();

            foreach ( $cat as $categories){
                if($cat->getName() == $category){
                    $subcategory->setCategory($cat);
                }
            }

            $subcategory->setImg($fileName);

            $em = $this->getDoctrine()->getManager();

            $em->persist($subcategory);
            $em->flush();

            $this->addFlash(
                'notice',
                'Subcategory Added'
            );

            return $this->redirect($this->generateUrl('subcategory'));
        }

        return $this->render('admin/subcategory/create_subcategory.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));

    }

    /**
     * @Route("/subcategory/edit/{id}", name="subcategory_edit")
     */
    public function editSubcategoryAction($id, Request $request)
    {
        $subcategory = $this->getDoctrine()
            ->getRepository('AppBundle:Subcategory')
            ->find($id);

        $subcategory->setName($subcategory->getName());
        $subcategory->setImg($subcategory->getImg());

        $form = $this->createForm(SubcategoryType::class, $subcategory);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($subcategory);

        if($form->isSubmitted() && $form->isValid())
        {
            //Get Date
            $name = $form['name']->getData();

            $img = $subcategory->getImg();
            $fileName = md5(uniqid()).'.'.$img->guessExtension();
            $img->move(
                $this->getParameter('subcategory_directory'),
                $fileName
            );


            $em = $this->getDoctrine()->getManager();
            $category = $em->getRepository('AppBundle:Subcategory')->find($id);

            $subcategory->setName($name);
            $subcategory->setImg($fileName);

            $em->flush();

            $this->addFlash(
                'notice',
                'Subcategory Changed'
            );

            return $this->redirect($this->generateUrl('subcategory'));
        }

        return $this->render('admin/subcategory/edit.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * @Route("/subcategory/delete/{id}", name="subcategory_delete")
     */
    public function deleteSubcategoryAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $subcategory = $em->getRepository('AppBundle:Subcategory')->find($id);

        $em->remove($subcategory);
        $em->flush();

        $this->addFlash(
            'notice',
            'Subcategory Removed'
        );

        return $this->redirectToRoute('subcategory');
    }

    /**
     * @Route("/user", name="user")
     */
    public function adminUserAction()
    {
        $users = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();

        $carts = $this->getDoctrine()
            ->getRepository('AppBundle:Cart')
            ->findAll();

        $data = array();

        foreach ( $users as $user)
        {
            $orders = 0;
            foreach ( $carts as $cart){
                if($cart->getUser()->getId() == $user->getId()){
                    $orders = $orders + 1;
                }
            }
            $data[$user->getId()] = $orders;
        }
        return $this->render('admin/user/index.html.twig', [

            'users' => $users,
            'carts' => $data
        ]);
    }

//    /**
//     * @Route("/user/create", name="user_create")
//     */
//    public function createUserAction( Request $request)
//    {
//        $subcategory = new Subcategory();
//
//        $categories = $this->getDoctrine()
//            ->getRepository('AppBundle:Category')
//            ->findAll();
//
//        $form = $this->createForm(SubcategoryType::class, $subcategory);
//        $form->handleRequest($request);
//
//        $validator = $this->get('validator');
//        $errors = $validator->validate($subcategory);
//
//        if($form->isSubmitted() && $form->isValid())
//        {
//            $name = $form['name']->getData();
//            $category = $form['category']->getData();
//
//            $img = $subcategory->getImg();
//            $fileName = md5(uniqid()).'.'.$img->guessExtension();
//            $img->move(
//                $this->getParameter('subcategory_directory'),
//                $fileName
//            );
//
//            $subcategory->setName($name);
//
//            $cat = $subcategory->getCategory();
//
//            foreach ( $cat as $categories){
//                if($cat->getName() == $category){
//                    $subcategory->setCategory($cat);
//                }
//            }
//
//            $subcategory->setImg($fileName);
//
//            $em = $this->getDoctrine()->getManager();
//
//            $em->persist($subcategory);
//            $em->flush();
//
//            $this->addFlash(
//                'notice',
//                'Subcategory Added'
//            );
//
//            return $this->redirect($this->generateUrl('subcategory'));
//        }
//
//        return $this->render('admin/subcategory/create_subcategory.html.twig', array(
//            'form' => $form->createView(),
//            'errors' => $errors,
//        ));
//
//    }

    /**
     * @Route("/user/edit/{id}", name="user_edit")
     */
    public function editUserAction($id, Request $request)
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);

        $user->setName($user->getName());
        $user->setEmail($user->getEmail());

        $form = $this->createForm(AdminUserType::class, $user);
        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if($form->isSubmitted() && $form->isValid())
        {
            //Get Date
            $name = $form['name']->getData();
            $email = $form['email']->getData();


            $em = $this->getDoctrine()->getManager();

            $user->setName($name);
            $user->setEmail($email);

            $em->flush();

            $this->addFlash(
                'notice',
                'User Changed'
            );

            return $this->redirect($this->generateUrl('user'));
        }

        return $this->render('admin/user/edit.html.twig', array(
            'form' => $form->createView(),
            'errors' => $errors,
        ));
    }

    /**
     * @Route("/user/delete/{id}", name="user_delete")
     */
    public function deleteUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        $em->remove($user);
        $em->flush();

        $this->addFlash(
            'notice',
            'User Removed'
        );

        return $this->redirectToRoute('user');
    }

    /**
     * @Route("/user/orders/{id}", name="user_orders")
     */
    public function adminUserOrderAction($id)
    {
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->find($id);

        $carts = $this->getDoctrine()
            ->getRepository('AppBundle:Cart')
            ->findAll();

        $data = array();

        $var = 0;
        foreach ( $carts as $cart)
        {
            if( $cart->getUser()->getId() == $id){
                $data[$var]=$cart;
                $var=$var+1;
            }
        }

        return $this->render('admin/user/order.html.twig', [

            'user' => $user,
            'carts' => $data
        ]);
    }
}