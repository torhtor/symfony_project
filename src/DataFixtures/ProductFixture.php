<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Products;
use App\Entity\Categorie;
use App\Entity\Tags;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $c1 = new Categorie();
        $c1->setName('categorie 1');
        $manager->persist($c1);

        $c2 = new Categorie();
        $c2->setName('categorie 2');
        $manager->persist($c2);

        $c3 = new Categorie();
        $c3->setName('categorie 3');
        $manager->persist($c3);

        $manager->flush();

        $t1 = new Tags();
        $t1->setName('sucré');
        $manager->persist($t1);

        $t2 = new Tags();
        $t2->setName('salé');
        $manager->persist($t2);

        $manager->flush();

        $p1 = new Products();
        $p1->setName('product 1');
        $p1->setDescription('description product 1');
        $p1->setPrice(9.99);
        $p1->setImage("https://via.placeholder.com/300x120.png");
        $p1->setStock(50);
        $p1->setPromo("non");
        $p1->setBio("non");
        $p1->setCategorie($c1);
        $p1->addTag($t1);
        $manager->persist($p1);

        $p2 = new Products();
        $p2->setName('product 2');
        $p2->setDescription('description product 2');
        $p2->setPrice(12.99);
        $p2->setImage("https://via.placeholder.com/300x120.png");
        $p2->setStock(150);
        $p2->setPromo("non");
        $p2->setBio('oui');
        $p2->setCategorie($c1);
        $p2->addTag($t1);
        $manager->persist($p2);

        $p3 = new Products();
        $p3->setName('product 3');
        $p3->setDescription('description product 3');
        $p3->setPrice(24.99);
        $p3->setImage("https://via.placeholder.com/300x120.png");
        $p3->setStock(0);
        $p3->setPromo("non");
        $p3->setBio('non');
        $p3->setCategorie($c2);
        $p3->addTag($t1);
        $p3->addTag($t2);
        $manager->persist($p3);

        $p4 = new Products();
        $p4->setName('product 4');
        $p4->setDescription('description product 4');
        $p4->setPrice(49.99);
        $p4->setImage("https://via.placeholder.com/300x120.png");
        $p4->setStock(200);
        $p4->setPromo("oui");
        $p4->setBio('oui');
        $p4->setCategorie($c2);
        $p4->addTag($t2);
        $manager->persist($p4);

        $p5 = new Products();
        $p5->setName('product 5');
        $p5->setDescription('description product 5');
        $p5->setPrice(29.99);
        $p5->setImage("https://via.placeholder.com/300x120.png");
        $p5->setStock(0);
        $p5->setPromo("non");
        $p5->setBio('oui');
        $p5->setCategorie($c3);
        $p5->addTag($t2);
        $manager->persist($p5);

        $p6 = new Products();
        $p6->setName('product 6');
        $p6->setDescription('description product 6');
        $p6->setPrice(7.99);
        $p6->setImage("https://via.placeholder.com/300x120.png");
        $p6->setStock(300);
        $p6->setPromo("oui");
        $p6->setBio('non');
        $p6->setCategorie($c3);
        $p6->addTag($t1);
        $manager->persist($p6);



        $manager->flush();


    }
}
