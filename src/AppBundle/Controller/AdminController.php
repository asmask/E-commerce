<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



/**
 * Categorie controller.
 *
 * @Route("admin/")
 */
class AdminController extends Controller
{

    /**
     * Lists all categorie entities.
     *
     * @Route("/", name="admin_home")
     * @Method("GET")
     */
    public function indexAction()
    {   $prix=0;
        $montant=0;
        $nbp=0; 
        $nbc=0;
    	 $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('AppBundle:Categorie')->findAll();
        $em = $this->getDoctrine()->getManager();  

        $products = $em->getRepository('AppBundle:Product')->findAll();
        $avis = $em->getRepository('AppBundle:Avis')->findAll();
        $cmd = $em->getRepository('AppBundle:Commande')->findAll();
        $pcom = $em->getRepository('AppBundle:ProduitCommande')->findAll();
        foreach ($pcom as $com ) {
          $montant+=$com->getPrix();
        }
        
          $nbp=count($products);
          $nbc=count($categories);
          $nba=count($avis);
          $nbcm=count($cmd);

	 return $this->render('admin_home.html.twig', array(
            'categories' => $categories,'products' => $products,'nbp'=>$nbp,'nbc'=>$nbc,'nba'=>$nba,'nbcm'=>$nbcm,'montto'=>$montant));
    }
    



}