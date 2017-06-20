<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->redirectToRoute('app.login');
    }


    /**
     * @Route("/choixQcm", name="choixQcm")
     */
    public function choixQcmAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/main.html.twig', [
            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),
            'qcm' => $this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll(),
        ]);
    }
}
