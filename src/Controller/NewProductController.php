<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductType;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewProductController extends AbstractController
{
    #[Route('/admin/new/product', name: 'new_product')]
    public function index(Request $request, ObjectManager $manager): Response
    {
        $product = new Products();
        dump($product);
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($product);
            $manager->flush();

            return $this->redirectToRoute('home');
        }

        return $this->render('new_product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/edit/product/{id}', name: 'edit_product')]
    public function index2(Request $request, ObjectManager $manager, Products $product): Response
    {

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $manager->persist($product);
            $manager->flush();

            return $this->redirectToRoute('show_products');
        }

        return $this->render('new_product/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/delete/product/{id}', name: 'delete_product')]
    public function index4(Request $request, ObjectManager $manager, Products $product): Response
    {

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){


            $manager->remove($product);
            $manager->flush();

            return $this->redirectToRoute('show_products');
        }

        return $this->render('new_product/delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/edit/product', name: 'show_products')]
    public function index3(ProductsRepository $repo){
        $products = $repo->findAll();
        return $this->render('new_product/show_products.html.twig', [
            'products' => $products,

        ]);
    }

}
