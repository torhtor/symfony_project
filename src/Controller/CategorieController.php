<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    #[Route('/categorie/{id}', name: 'categorie')]
    public function index(Categorie $cat, CategorieRepository $repo, Counter $counter): Response
    {
        $id = $cat->getId();
        $products = $cat->getProducts();
        $categorie = $repo->findOneById($id);
        $data = $counter->getCounter();
        return $this->render('categorie/index.html.twig', [
            'products' => $products,
            'categorie'=>$categorie,
            'counter'=>$data
        ]);
    }
}
