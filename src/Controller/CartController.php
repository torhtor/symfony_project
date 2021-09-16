<?php

namespace App\Controller;

use App\Entity\Products;
use App\Repository\ProductsRepository;
use App\utils\Cart;
use App\utils\Counter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'cart')]
    public function index(Counter $counter, Cart $cart): Response
    {
        $panier = $cart->getProductsInCart();
        dump($cart);
        $data = $counter->getCounter();

        return $this->render('cart/index.html.twig', [
            'counter'=>$data,
            'panier'=>$panier
        ]);
    }
}
