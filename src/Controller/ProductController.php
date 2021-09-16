<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/products/{id}', name: 'product')]
    public function index(Products $p, ProductsRepository $repo, Counter $counter): Response
    {
        $data = $counter->getCounter();
        $pid = ($p->getId());
        $product = $repo->findOneById($pid);
        return $this->render('product/index.html.twig', [
            'product' => $product,
            'counter'=>$data
        ]);
    }
}
