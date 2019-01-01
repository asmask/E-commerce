<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use AppBundle\Entity\Avis;
use AppBundle\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$cat1=new Categorie();
    	$cat1->setLibelle('Woman wear');
    	$cat1->setTexte('Woman wear');
    	$cat1->setImage('images/bg-img/bg-3.jpg');
    	$cat1->setUpdatedAt(new \DateTime());
    	$manager->persist($cat1);

        $cat2=new Categorie();
        $cat2->setLibelle('Man wear');
        $cat2->setTexte('Man wear');
        $cat2->setImage('images/bg-img/bg-1.jpg');
        $cat2->setUpdatedAt(new \DateTime());
        $manager->persist($cat2);

        $cat3=new Categorie();
        $cat3->setLibelle('Accessories');
        $cat3->setTexte('Accessories');
        $cat3->setImage('images/bg-img/bg-2.jpg');
        $cat3->setUpdatedAt(new \DateTime());
        $manager->persist($cat3);


        $p1=new Product();
        $p1->setLibelle('Black Tshirt');
        $p1->setDescription('Black Tshirt with a beautiful details');
        $p1->setTexte('Black Tshirt with a beautiful details  coton for hot days for all size ');
        $p1->setImage('images/product-img/product-2.jpg');
        $p1->setPrix('45');
        $p1->setImageprimaire('images/product-img/product-3.jpg');
        $p1->setImagesecondaire('images/product-img/product-2.jpg');
        $p1->setCategorie($cat1);
        $manager->persist($p1);


        $p2=new Product();
        $p2->setLibelle('White Tshirt');
        $p2->setDescription('White Tshirt with a beautiful details');
        $p2->setTexte('White Tshirt with a beautiful details coton for cold days for all size ');
        $p2->setImage('images/product-img/product-3.jpg');
        $p2->setImageprimaire('images/product-img/product-2.jpg');
        $p2->setImagesecondaire('images/product-img/product-3.jpg');
        $p2->setPrix('50');
        $p2->setCategorie($cat1);
        $manager->persist($p2);

        $p3=new Product();
        $p3->setLibelle('Cocktail dress');
        $p3->setDescription('Cocktail dress with a beautiful details');
        $p3->setTexte('Cocktail dress with a beautiful details  for hot days for all size ');
        $p3->setImage('images/product-img/product-5.jpg');
        $p3->setImageprimaire('images/product-img/product-5.jpg');
        $p3->setImagesecondaire('images/product-img/product-5.jpg');
        $p3->setPrix('145');
        $p3->setCategorie($cat1);
        $manager->persist($p3);

        $p4=new Product();
        $p4->setLibelle('Gray jacket');
        $p4->setDescription('Gray jacket with a beautiful details');
        $p4->setTexte('Gray jacket with a beautiful details for all days and all size ');
        $p4->setImage('images/product-img/product-6.jpg');
        $p4->setImageprimaire('images/product-img/product-6.jpg');
        $p4->setImagesecondaire('images/product-img/product-6.jpg');
        $p4->setPrix('100');
        $p4->setCategorie($cat2);
        $manager->persist($p4);


        $p5=new Product();
        $p5->setLibelle('Handbag');
        $p5->setDescription('Handbag with a beautiful details');
        $p5->setTexte('Handbag with a beautiful details for all days and nights ');
        $p5->setImage('images/product-img/product-4.jpg');
        $p5->setImageprimaire('images/product-img/product-4.jpg');
        $p5->setImagesecondaire('images/product-img/product-4.jpg');
        $p5->setPrix('80');
        $p5->setCategorie($cat3);
        $manager->persist($p5);

        $p6=new Product();
        $p6->setLibelle('Hat');
        $p6->setDescription('Hat with a beautiful details');
        $p6->setTexte('Hat with a beautiful details  for hot days and crazy summer ');
        $p6->setImage('images/product-img/product-7.jpg');
        $p6->setImageprimaire('images/product-img/product-7.jpg');
        $p6->setImagesecondaire('images/product-img/product-7.jpg');
        $p6->setPrix('100');
        $p6->setCategorie($cat3);
        $manager->persist($p6);


        $p7=new Product();
        $p7->setLibelle('Scarf');
        $p7->setDescription('Scarf with a beautiful details');
        $p7->setTexte('Scarf with a beautiful details  for cold days and cold winter ');
        $p7->setImage('images/product-img/product-8.jpg');
        $p7->setImageprimaire('images/product-img/product-8.jpg');
        $p7->setImagesecondaire('images/product-img/product-8.jpg');
        $p7->setPrix('20');
        $p7->setCategorie($cat3);
        $manager->persist($p7);



        $p8=new Product();
        $p8->setLibelle('Coat');
        $p8->setDescription('Coat with a beautiful details');
        $p8->setTexte('Coat with a beautiful details  for cold days and cold winter ');
        $p8->setImage('images/product-img/product-8.jpg');
        $p8->setImageprimaire('images/product-img/product-8.jpg');
        $p8->setImagesecondaire('images/product-img/product-8.jpg');
        $p8->setPrix('20');
        $p8->setCategorie($cat1);
        $manager->persist($p8);

        $p9=new Product();
        $p9->setLibelle('Basic Tshirt');
        $p9->setDescription('Basic Tshirt coton');
        $p9->setTexte('Basic Tshirt details  for all days and all size ');
        $p9->setImage('images/product-img/product-6.jpg');
        $p9->setImageprimaire('images/product-img/product-6.jpg');
        $p9->setImagesecondaire('images/product-img/product-6.jpg');
        $p9->setPrix('100');
        $p9->setCategorie($cat2);
        $manager->persist($p9);

        $a1=new Avis();
        $a1->setTexte('Bonjour Je vous souhaite une année formidable' );
        $a1->setNomclt('Skhiri Asma');
        $a1->setImage('images/bg-img/tes-1.jpg');
        $a1->setVille('Monastir-Tunisie');
        $manager->persist($a1);

        $a2=new Avis();
        $a2->setTexte('Bonjour Je vous souhaite une bonne année pleinne de joie et de reuissite' );
        $a2->setNomclt('Asma Shiri');
        $a2->setImage('images/bg-img/tes-1.jpg');
        $a2->setVille('Monastir-Tunisie');
        $manager->persist($a2);


        $manager->flush();

    }
}