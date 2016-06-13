<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
* @Route(path="/societe")
*/
class SocieteController extends Controller
{
    /**
     *
     * @var \AppBundle\Manager\SocieteManager
     */
    protected $societeManager;

    /**
     * @return \AppBundle\Manager\SocieteManager
     */
    protected function getSocieteManager()
    {
        return $this->container->get('app.manager.societe');
    }
    
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $societes = $this->getSocieteManager()->getAll();
        
        return $this->render('AppBundle:Societe:list.html.twig', array(
            'societes' => $societes
        ));
    }

    /**
     * @Route("/{id}")
     */
    public function showAction($id)
    {
        $societe = $this->getSocieteManager()->getById($id);
        
        return $this->render('AppBundle:Societe:show.html.twig', array(
            'societe' => $societe
        ));
    }

}
