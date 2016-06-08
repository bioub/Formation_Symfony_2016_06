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
        return $this->render('AppBundle:Contact:list.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/{id}", requirements={"id": "[1-9][0-9]*"})
     */
    public function showAction($id)
    {
        return $this->render('AppBundle:Contact:show.html.twig', array(
            // ...
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
