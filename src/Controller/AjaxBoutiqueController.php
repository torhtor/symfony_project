<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Tags;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class AjaxBoutiqueController extends AbstractController
{
    #[Route('/api/boutique/productsByCategory/{id}', name: 'ajax_boutique')]
    public function index(Categorie $cat): JsonResponse
    {
        $response = new JsonResponse();
        $data = $cat ->getProducts();
        $tabDataPushed=[];

        foreach ($data as $product){
            $tagTab = [];
            $id = $product->getId();
            $name = $product->getName();
            $desc = $product->getDescription();
            $img = $product->getImage();
            $bio = $product->getBio();
            $promo = $product->getPromo();
            $cate = $product->getCategorie();
            $cateName = $cate->getName();
            $price = $product->getPrice();
            $stock = $product->getStock();
            $tag = $product->getTag();

            foreach ($tag as $method){
                $tagName = $method->getName();
                array_push($tagTab, $tagName);
            }

            $tabData=[
                'id'=>$id,
                'name'=>$name,
                'description'=> $desc,
                'image'=> $img,
                'bio'=>$bio,
                'promo'=>$promo,
                'category'=>$cateName,
                'price'=>$price,
                'stock'=>$stock,
                'tag'=>$tagTab
            ];
            array_push($tabDataPushed, $tabData);
            $response->setData($tabDataPushed);

        }
        return $response;
    }

    #[Route('/api/boutique/productsByTag/{id}', name: 'ajax_boutique_tag')]
    public function index2(Tags $tags): JsonResponse
    {
        $response = new JsonResponse();
        $data = $tags->getProducts();
        $tabDataPushed=[];

        foreach ($data as $product){
            $tagTab = [];
            $id = $product->getId();
            $name = $product->getName();
            $desc = $product->getDescription();
            $img = $product->getImage();
            $bio = $product->getBio();
            $promo = $product->getPromo();
            $cate = $product->getCategorie();
            $cateName = $cate->getName();
            $price = $product->getPrice();
            $stock = $product->getStock();
            $tag = $product->getTag();

            foreach ($tag as $method){
                $tagName = $method->getName();
                array_push($tagTab, $tagName);
            }

            $tabData=[
                'id'=>$id,
                'name'=>$name,
                'description'=> $desc,
                'image'=> $img,
                'bio'=>$bio,
                'promo'=>$promo,
                'category'=>$cateName,
                'price'=>$price,
                'stock'=>$stock,
                'tag'=>$tagTab
            ];
            array_push($tabDataPushed, $tabData);
            $response->setData($tabDataPushed);

        }
        return $response;

    }
}
