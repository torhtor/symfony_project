<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use App\Repository\TagsRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductsRepository;


class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]

    public function index(ProductsRepository $repo, CategorieRepository $cateRepo, TagsRepository $tagsRepo, Counter $counter): Response
    {
        $categories = $cateRepo->findAll();
        $tags = $tagsRepo->findAll();
        $pid = rand(1, count($repo->findAll()));
        $product = $repo->findOneById($pid);
        $data = $counter->getCounter();

        return $this->render('home/index.html.twig', [
            'product' => $product,
            'categories'=>$categories,
            "tags"=>$tags,
            'counter'=>$data
        ]);
    }
}
