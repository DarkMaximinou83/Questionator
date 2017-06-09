<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\BrowserKit\Request;


class QcmController extends Controller
{

    /**
     * @Route("/addQCM")
     */
    public function addQCMAction()
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:addQcm.html.twig', array(

            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),

        ));
    }

}
