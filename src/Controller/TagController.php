<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Repository\TagsRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    #[Route('/tag/{id}', name: 'tag')]
    public function index(Tags $tag, TagsRepository $repo, Counter $counter ): Response
    {
        $data = $counter->getCounter();
        $tid = $tag->getId();
        $products = $tag->getProducts();
        $tag = $repo->findById($tid);
        return $this->render('tag/index.html.twig', [
            'products' => $products,
            'tag'=> $tag,
            'counter'=>$data
        ]);
    }
}
