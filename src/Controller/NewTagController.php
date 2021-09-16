<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Form\TagType;
use App\Repository\TagsRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewTagController extends AbstractController
{
    #[Route('/admin/new/tag', name: 'new_tag')]
    public function index(Request $request, ObjectManager $manager): Response
    {
        $tag = new Tags();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($tag);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('new_tag/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/edit/tag/{id}', name: 'new_tag')]
    public function index2(Request $request, ObjectManager $manager, Tags $tag): Response
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->persist($tag);
            $manager->flush();

            return $this->redirectToRoute('show_tags');
        }
        return $this->render('new_tag/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/delete/tag/{id}', name: 'delete_tag')]
    public function index4(Request $request, ObjectManager $manager, Tags $tag): Response
    {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $manager->remove($tag);
            $manager->flush();

            return $this->redirectToRoute('show_tags');
        }
        return $this->render('new_tag/delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/edit/tag', name: 'show_tags')]
    public function index3(TagsRepository $repo){
        $tags = $repo->findAll();
        return $this->render('new_tag/show_tags.html.twig', [
            'tags' => $tags,
        ]);
    }
}
