<?php

namespace App\Controller;

use App\Repository\ProductsRepository;
use App\Repository\CategorieRepository;
use App\Repository\TagsRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController extends AbstractController
{
    #[Route('/products', name: 'products')]
    public function index(ProductsRepository $repo, TagsRepository $repoTag, Counter $counter): Response
    {
        $data = $counter->getCounter();
        $tags = $repoTag->findAll();
        $products = $repo->findAll();
        return $this->render('products/index.html.twig', [
            'products' => $products,
            'tags'=>$tags,
            'counter'=>$data
        ]);
    }
}
