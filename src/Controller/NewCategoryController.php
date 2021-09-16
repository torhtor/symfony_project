<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Products;
use App\Form\CategoryType;
use App\Repository\CategorieRepository;
use App\Repository\ProductsRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewCategoryController extends AbstractController
{
    #[Route('/admin/new/category', name: 'new_category')]
    public function index(Request $request, ObjectManager $manager): Response
    {
        $cate = new Categorie();
        $form = $this->createForm(CategoryType::class, $cate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $image_file = $form->get('image')->getData();
            $file_name = 'category_'.uniqid().'.'.$image_file->guessExtension();
            $image_file->move($this->getParameter('images_dir'),
            $file_name);
            $manager->persist($cate);
            $manager->flush();

            return $this->redirectToRoute('show_categories');
        }


        return $this->render('new_category/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/edit/category/{id}', name: 'edit_category')]
    public function index2(Request $request, ObjectManager $manager, Categorie $cate): Response
    {
        $form = $this->createForm(CategoryType::class, $cate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($cate);
            $manager->flush();

            return $this->redirectToRoute('show_categories');
        }


        return $this->render('new_category/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/delete/category/{id}', name: 'delete_category')]
    public function index4(Request $request, ObjectManager $manager, Categorie $cate): Response
    {

        $form = $this->createForm(CategoryType::class, $cate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            $manager->remove($cate);
            $manager->flush();

            return $this->redirectToRoute('show_categories');
        }


        return $this->render('new_category/delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/admin/edit/category', name:'show_categories')]
    public function index3(CategorieRepository $repo){
        $categories = $repo->findAll();
        return $this->render('new_category/show_categories.html.twig', [
            'categories' => $categories,

        ]);
    }

}
