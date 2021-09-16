<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{
    #[Route('/categories', name: 'categories')]
    public function index(CategorieRepository $repo, Counter $counter): Response
    {
        $data = $counter->getCounter();
        $categories = $repo->findAll();
        return $this->render('categories/index.html.twig', [
            'categories' => $categories,
            'counter'=>$data
        ]);
    }
}
