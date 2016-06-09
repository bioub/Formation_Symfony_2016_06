<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        /* @var $repo \AppBundle\Repository\ContactRepository */
        
        $contact = $repo->findWithSociete($id);
        
        if (!$contact) {
            throw $this->createNotFoundException();
        }
        
        return $this->render('AppBundle:Contact:show.html.twig', array(
            'contact' => $contact
        ));
    }

    /**
     * @Route("/ajouter")
     */
    public function addAction(Request $request)
    {
        $contact = new Contact();
        
        $form = $this->createForm(ContactType::class, $contact);
        
        $form->handleRequest($request);
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($contact);
            $em->flush();
            
            $this->addFlash('success', $contact->getPrenom() . ' a bien été créé');
            
            //return $this->redirectToRoute('app_contact_show', ['id' => $contact->getId()]);
            return $this->redirectToRoute('app_contact_list');
        }
        
        return $this->render('AppBundle:Contact:add.html.twig', array(
            'contactForm' => $form->createView()
        ));
    }

}
