<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Category;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Session\Session;

class PanierController extends Controller
{

    /**
     * @Route("/panier/ajouter/{id}", name="panier_ajout")
     */
    public function ajoutAction($id)
    {
        $session = new Session();
        @$p=$session->get('panier');
        @$p[$id]++;
        $session->set('panier', $p);
        return  $this->redirectToRoute('panier'); 
        $products = $this->getDoctrine()->getManager()->getRepository(Product::class)->findById(array_keys($p));
      
        return $this->render('Panier/panier.html.twig', array(
            'products' => $products, 'panier' => $p
        ));

    }
  

   
    /**
     * @Route("/panier", name="panier")
     */
    public function afficherPanier()
    {
        $session = new Session();
        @$p=$session->get('panier');

        $products = $this->getDoctrine()->getManager()->getRepository(Product::class)->findById(array_keys($p));

        return $this->render('Panier/panier.html.twig', array(
            'products' => $products, 'panier' => $p
        ));

    }
     
 /**
     * @Route("/panier/supprimer", name="panier_remove")
     */
    public function RemovePanier()
    {
        $session = new Session();
        @$p=$session->remove('panier');
       
        return $this->render('Panier/panierVide.html.twig');

      
    }
     /**
     * @Route("/panier/supprimer/{id}", name="panier_remove_by_id")
     */
    public function RemoveItem(Request $request,$id)
    {
        $session = $request->getSession();
        @$p=$session->get('panier');

        unset($p[$id]);
        @$session->set('panier',$p);
        if(!$p){
         return $this->redirectToRoute('panier_remove');
        }
return $this->redirectToRoute('panier');
      
    }

     function cartCount() {
      $session = new Session();
      $cart = $session->get('panier');
      $total = 0;
      if ($cart)
        foreach ($cart as $id => $qty) 
          $total += $qty;
        
      return new Response($total);
     }


}
