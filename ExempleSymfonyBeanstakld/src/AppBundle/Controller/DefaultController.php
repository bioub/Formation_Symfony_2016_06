<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Commune;
use Pheanstalk\Pheanstalk;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/diagnostic/{insee}/geometrique", name="homepage")
     */
    public function indexAction(Request $request, $insee)
    {


        $repo = $this->getDoctrine()->getRepository(Commune::class);

        $result = $repo->findBy(['insee' => $insee]);

        if (!$result) {
            $message = 'Commune inexistante';
        }
        else {
            $message = 'Requete en cours vous serez prévenu par mail';

            $queue =  new Pheanstalk('localhost');
            $queue->useTube('diag-geo-tube');

            $queue->put(json_encode(['insee' => $insee]));
        }


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'message' => $message
        ]);
    }
}
