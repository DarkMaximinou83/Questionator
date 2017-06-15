<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="rjuste", type="integer")
     */
    private $rjuste;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;






    /**
     * @var int
     *
     * @ORM\Column(name="difficulty", type="integer")
     */
    private $difficulty;

    /**
     * @var Responses
     *
     * @ORM\OneToMany(targetEntity="Responses", mappedBy="questions", cascade={"persist"})
     *
     * @Groups({"details"})
     */
    private $responses;




    /**
     * @var Qcm
     *
     * @ORM\ManyToOne(targetEntity="Qcm", inversedBy="question", cascade={"persist"})
     * @ORM\JoinColumn(name="qcm_id", referencedColumnName="id")
     */
    private $qcm;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Qcm
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * @param Qcm $qcm
     */
    public function setQcm($qcm)
    {
        $this->qcm = $qcm;
    }


    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getRjuste()
    {
        return $this->rjuste;
    }

    /**
     * @param int $rjuste
     */
    public function setRjuste($rjuste)
    {
        $this->rjuste = $rjuste;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param int $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

    /**
     * @return Responses
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param Responses $responses
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }






    /**
     * Add response
     *
     * @param \AppBundle\Entity\Responses $response
     *
     * @return question
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;

        return $this;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Remove response
     *
     * @param \AppBundle\Entity\Responses $response
     */
    public function removeResponse(\AppBundle\Entity\Responses $response)
    {
        $this->responses->removeElement($response);
    }
}
