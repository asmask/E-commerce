<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\ProduitCommande;
use AppBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Commande controller.
 *
 * @Route("commande")
 */
class CommandeController extends Controller
{

    /**
     * Lists all commande entities.
     *
     * @Route("/", name="commande_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

         $commandes = $em->getRepository('AppBundle:Commande')->findAll();
         $pcom = $em->getRepository('AppBundle:ProduitCommande')->findAll();
        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,'pcom'=>$pcom,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     * @Route("/new/{p}/{total}", name="commande_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request,$total,$p)
    {
        $commande = new Commande();
        $form = $this->createForm('AppBundle\Form\CommandeType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();
            $t=$total;
            return $this->redirectToRoute('commande_validation', array('id' => $commande->getId(),'total'=>$total,'pr'=>$p));
        }

        return $this->render('commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a commande entity.
     *
     * @Route("/{id}", name="commande_show")
     * @Method("GET")
     */
    public function showAction(Commande $commande)
    {
        $pcom = $this->getDoctrine()->getManager()->getRepository('AppBundle:ProduitCommande')->find($commande);
        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,'pcom'=>$pcom,
          
        ));
    }

      /**
     * Finds and displays a commande entity.
     *
     * @Route("/validation/{id}/{total}/{pr}", name="commande_validation")
     * @Method("GET")
     */
    public function validationAction(Commande $commande,$total,$pr)
    {       
            $s=new Session();
            $p=$s->get('panier');
            $em = $this->getDoctrine()->getManager();

            foreach ($p as $idpro => $qte) {
                $product = $this->getDoctrine()->getManager()->getRepository('AppBundle:Product')->find($idpro);
                $pc = new ProduitCommande();
                $pc->setProduit($product);
                $pc->setCommande($commande);
                $pc->setQte($qte);
                $pc->setPrix($total);
                $em->persist($pc);
                
            }
            $em->flush();
                                
          $p=$s->remove('panier');
          
         

            return $this->render('commande/validation.html.twig', array(
            'commande' => $commande,'total'=>$total,'p'=>$pr
        ));
    }



}
