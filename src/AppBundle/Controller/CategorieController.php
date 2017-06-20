<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Categories;
use AppBundle\Form\AjoutCatType;

class CategorieController extends Controller
{
    /**
     * @Route("/Add",name ="Add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function AddAction()
    {
        return $this->render('AppBundle:Categorie:add.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/AddCat", name ="add_cat")
     * @Security("has_role('ROLE_ADMIN')")

     */
    public function AjouterAction(Request $request)
    {
        $cat=new Categories();





        $form=$this->createForm(AjoutCatType::class,$cat);
        $form->handleRequest($request);
        if($form->IsSubmitted()&&$form->IsValid()){
            $em=$this->getDoctrine()->getManager();




            $em->persist($cat);

            $em->flush();


            return $this->redirectToRoute('homepage');

        }
        return $this->render('AppBundle:Categorie:ajouter.html.twig', array(
            'form' => $form->createView(),
            'cat'=>$cat
        ,
        ));
    }

}
