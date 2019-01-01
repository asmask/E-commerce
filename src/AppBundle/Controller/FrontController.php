<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Product;

use AppBundle\Entity\Avis;

class FrontController extends Controller
{

    
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Categorie::class);
          $categories = $repo->findAll();

        $avis = $em->getRepository(Avis::class)->findAll();
         return $this->render('Front/index.html.twig', array(
            'categories' => $categories,'avi' => $avis,
        ));
    }

    /**
     * @Route("/categorie/{categorie}", name="categorie")
     */
    public function categorieAction(Categorie $categorie)
    {
    $produits = $this->getDoctrine()->getManager()->getRepository(Product::class)->
    findByCategorie($categorie);
       
        
         return $this->render('Front/produit.html.twig', array(
        'produits' => $produits,'categorie'=>$categorie,
        ));
    }

    /**
     * @Route("/produit/{id}", name="product_details")
     */
    public function productAction($id)
    {
        $product = $this->getDoctrine()->getManager()->getRepository(Product::class)->find($id);
        $products= $this->getDoctrine()->getManager()->getRepository(Product::class)->findAll();
            if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
         return $this->render('Front/product-details.html.twig', array(
        'produit' => $product,'products'=>$products,
        ));
    }

  
}
