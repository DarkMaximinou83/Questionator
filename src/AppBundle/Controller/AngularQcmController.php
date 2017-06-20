<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Categories;
use AppBundle\Entity\Question;
use AppBundle\Entity\Responses;
use AppBundle\Entity\Qcm;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
/**
 * @Route("api/play", defaults={"_format" ="json"})
 */
class AngularQcmController extends FOSRestController
{

    /**
     * @Get("/{qcm_id}")
     * @View(serializerGroups={"details"},{"list"})
     * @ApiDoc(
     *     section = "Qcm",
     *     description="Return a specific qcm by its id",
     *     output={"class" = "AppBundle\Entity\Qcm", "groups"={"details"},{"list"}}
     * )
     * @ParamConverter("qcm", options={"id" = "qcm_id"})
     */
    public function playQCMAction(Qcm $qcm)
    {
        // replace this example code with whatever you need
        return $qcm->getCat();
    }


    /**
     * @Get()
     * @View(serializerGroups={"details"})
     * @ApiDoc(
     *     section = "Qcm",
     *     description="Return all qcm",
     *     output={"class" = "AppBundle\Entity\Qcm", "collection" = true, "groups"={"details"}}
     * )
     */
    public function listAction()
    {
        return $this->getDoctrine()->getRepository('AppBundle:Qcm')->findAll();
    }
}
