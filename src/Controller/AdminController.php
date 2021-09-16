<?php

namespace App\Controller;

use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(Counter $counter): Response
    {
        $data = $counter->getCounter();
        return $this->render('admin/index.html.twig', [
            'counter' => $data,
        ]);

    }
}
