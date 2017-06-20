<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Categories;
use AppBundle\Entity\Question;
use AppBundle\Entity\Responses;
use AppBundle\Entity\Qcm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
/**
 * @Route("api/qcm", defaults={"_format" ="json"})
 */
class AngularControllerController extends  FOSRestController
{








    /**
     * @Post()
     * @View(serializerGroups={"list"})
     * @ApiDoc(
     *     section = "Qcm",
     *     description="Create a new questions",
     *     input={"class" = "AppBundle\Entity\Qcm", "groups"={"list"}},
     *     output={"class" = "AppBundle\Entity\Qcm", "groups"={"list"}}
     * )
     * @ParamConverter("qcm", converter="fos_rest.request_body")
     */
    public function createActionQcm(Qcm $qcm)
    {
        $em = $this->getDoctrine()->getManager();

        // récupère la catégorie en base
        $cat = null;
        if ($qcm->getCat() !== null && $qcm->getCat()->getId() !== null) {
            $cat = $em->getRepository(Categories::class)->find($qcm->getCat()->getId());
        }

        if ($cat === null) {
            throw new \Exception('Category is required');
        }
        foreach ($qcm->getQuestion() as $value) {

            $value->setQcm($qcm);



            foreach ($value->getResponses() as $value2) {
                $value2->setQuestions($value);

            }
        }
        $cat->addQcm($qcm);

        $qcm->setCat($cat); // associe une catégorie existante
        $em->persist($qcm);
        $em->flush();




        return $qcm;
    }




    /**
     * @Get()
     * @View(serializerGroups={"details"})
     * @ApiDoc(
     *     section = "Categories",
     *     description="Return all categorie",
     *     output={"class" = "AppBundle\Entity\Categories", "collection" = true, "groups"={"details"}}
     * )
     */
    public function listAction()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Categories')->findAll();
    }





}
