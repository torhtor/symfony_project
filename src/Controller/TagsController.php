<?php

namespace App\Controller;

use App\Entity\Tags;
use App\Repository\ProductsRepository;
use App\Repository\TagsRepository;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagsController extends AbstractController
{
    #[Route('/tags', name: 'tags')]
    public function index(TagsRepository $repo, Counter $counter): Response
    {
        $tags = $repo->findAll();
        $data = $counter->getCounter();

        return $this->render('tags/index.html.twig', [
            'tags' => $tags,
            'counter'=>$data
        ]);
    }
}
