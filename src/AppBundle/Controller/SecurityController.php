<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * Categorie controller.
 *
 * @Route("security")
 */
class SecurityController extends Controller
{
    /**
     * Lists all categorie entities.
     *
     * @Route("/inscription", name="inscrit")
     */
	public function Registration(Request $request,UserPasswordEncoderInterface $encoder){
		$user = new user();
        $form = $this -> createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('connexion');
}
    return $this->render('security/registration.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
	}
	 /**
     * Lists all categorie entities.
     *
     * @Route("/connexion", name="connexion")
     */
public function loginAction(Request $request)
{
return $this->render('security/login.html.twig');
}
}
