<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route(path="/contact")
 */
class ContactController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Contact');
        
        $liste = $repo->findBy([], ['prenom' => 'ASC']);
        
        return $this->render('AppBundle:Contact:list.html.twig', [
            'contacts' => $liste
        ]);
    }

    /**
     * @Route("/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        $repo = $this->getDoctrine()->getRepository('AppBundle:Contact');
        
        $contact = $repo->find($id);
        
        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

    /**
     * @Route("/ajouter")
     */
    public function addAction()
    {
        return $this->render('AppBundle:Contact:add.html.twig', array(
            // ...
        ));
    }

}
