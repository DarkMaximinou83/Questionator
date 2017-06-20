<?php

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\BrowserKit\Request;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Question;
use AppBundle\Entity\Responses;
use AppBundle\Entity\Qcm;


class QcmController extends Controller
{

    /**
     * @Route("/addQCM",name="addQCM")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addQCMAction()
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:addQcm.html.twig', array(

            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),

        ));
    }


    /**
     * @Route("/playBegin/{id}",name="playBegin")
     */
    public function playBeginAction($id)

    {
        $questionTab2= array();
        $compt=0;
        $em = $this->getDoctrine()->getManager();
        $questionTab=$this->getDoctrine()->getRepository('AppBundle:Question')->findAll();
        foreach( $questionTab as $question) {
            if($question->getQcm()->getId()==$id){
                $questionTab2[]=$question;
                $question->setRjuste(88);
                $em->persist($question);
                $em->flush();
                $compt++;

            }

        }


        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:play.html.twig', array(

            'qcm' => $this->getDoctrine()->getRepository('AppBundle:Qcm')->findById($id),
            'question'=>$questionTab2,
            'response'=>$this->getDoctrine()->getRepository('AppBundle:Responses')->findAll(),
            'nbQuestion'=>$compt,

        ));
    }

    /**
     * @Route("validQuestion",name="validQuestion")
     */
    public function validAction()
    {
        $em = $this->getDoctrine()->getManager();

        $laPoste=$_POST['response'];

        foreach( $laPoste as $id_response)
        {

           $responseTab= $this->getDoctrine()->getRepository('AppBundle:Responses')->findById($id_response);
            foreach( $responseTab as $response) {


                $questionTab= $this->getDoctrine()->getRepository('AppBundle:Question')->findById($response->getQuestions()->getId());
                foreach( $questionTab as $question) {
                    if($response->getJuste()==0){


                        $question->setRjuste(0);

                        $em->persist($question);
                        $em->flush();
                    }
                    else{
                        if($question->getRjuste()==88){
                            $question->setRjuste(1);

                            $em->persist($question);
                            $em->flush();
                        }

                    }

                }



            }



        }
        return $this->redirectToRoute('homepage');

    }

    /**
     * @Route("/supprQCM/{id}",name="supprQCM")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function supprQCMAction($id)
    {


        $em = $this->getDoctrine()->getManager();

        $questionTab=$this->getDoctrine()->getRepository('AppBundle:Question')->findAll();
        $responseTab=$this->getDoctrine()->getRepository('AppBundle:Responses')->findAll();
        foreach( $questionTab as $question) {
            if ($question->getQcm()->getId()==$id) {

            foreach ($responseTab as $response) {
                if ($response->getQuestions()->getid()==$question->getId()){
                    $em->remove($response);
                    $em->flush();

                }

        }
                $em->remove($question);
                $em->flush();
        }
        }
        $qcm=$this->getDoctrine()->getRepository('AppBundle:Qcm')->findById($id);
        foreach ($qcm as $qcm2) {
            $em->remove($qcm2);
            $em->flush();
        }


        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:affichageQcm.html.twig', array(

            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),
            'qcm' => $this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll(),

        ));
    }


    /**
     * @Route("/affichageQCM",name="affichageQCM")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function affichageQCMAction()
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:affichageQcm.html.twig', array(

            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),
            'qcm' => $this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll(),

        ));
    }


    /**
     * @Route("/modifQCM/{id}",name="modifQCM")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function modifQCMAction($id)
    {





        // replace this example code with whatever you need
        return $this->render('AppBundle:Qcm:edit.html.twig', array(

            'id' => $id,


        ));
    }




    /**
     * @Route("/resultatQcm",name="resultatQcm")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function resultatQcmAction()
    {
        $em = $this->getDoctrine()->getManager();


        $qcmTab=$this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll();
        $questionTab=$this->getDoctrine()->getRepository('AppBundle:Question')->findAll();


        foreach( $qcmTab as $qcm) {
            $count=0;

            foreach( $questionTab as $question) {
                if ($question->getQcm()->getId()==$qcm->getId()) {
                    if($question->getRjuste()==0){
                        $qcm->setVerif(1);
                        $em->persist($qcm);
                        $em->flush();

                    }
                    else if($question->getRjuste()==1){
                        $qcm->setVerif(1);
                        $em->persist($qcm);
                        $em->flush();
                        $count++;

                    }

                }

            }
            $qcm->setTotal($count);
            $em->persist($qcm);
            $em->flush();
        }



        return $this->render('AppBundle:Qcm:resultat.html.twig', array(

            'cat' => $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll(),
            'qcm' => $this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll(),


        ));
    }









}



