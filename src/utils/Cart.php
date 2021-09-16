<?php

namespace App\utils;

use App\Entity\Products;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Cart
{
    private array $productsInCart;
    private SessionInterface $session;

    function __construct(SessionInterface $session){
        $this->session = $session;
        if ($session->has('cart')){
            $this->productsInCart = $session->get('cart');
            return;
        }
        $this->productsInCart = [];
        $session->set('cart',$this->productsInCart);
    }

    /**
     * @return array|mixed
     */
    public function getProductsInCart(): mixed
    {
        return $this->productsInCart;
    }

    /**
     * @param array|mixed $productsInCart
     */
    public function setProductsInCart(mixed $productsInCart): void
    {
        $this->productsInCart = $productsInCart;
    }
    public function addProduct(Products $product, int $quantity){
        $cp = new CartProduct($product, $quantity);
        array_push($this->productsInCart, $cp);
        $this->session->set('cart',$this->productsInCart);
    }
    public function removeProduct(Products $product, int $quantity){
        $i = 0;
        foreach ($this->productsInCart as $cp) {
            if ($cp->product == $product) {
                if ($cp->quantity <= $quantity) {
                    unset($this->productsInCart[$i]);
                } else {
                    $cp->quantity -= $quantity;
                }
            }
            $i++;
        }
        $this->session->set('cart',$this->productsInCart);
    }
}