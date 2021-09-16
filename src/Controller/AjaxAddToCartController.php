<?php

namespace App\Controller;

use App\Entity\Products;
use App\utils\Cart;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class AjaxAddToCartController extends AbstractController
{
    #[Route('/api/boutique/addToCart/{id}', name: 'ajax_add_to_cart')]
    public function index(Products $product, Cart $cart): JsonResponse
    {
        $cart->addProduct($product, 1);


        $response = new JsonResponse();
        $id = $product->getId();

        $tabData=[
            'id'=>$id,
        ];
        $response->setData($tabData);
        return $response;
    }

}
