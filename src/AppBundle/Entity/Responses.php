<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Responses
 *
 * @ORM\Table(name="responses")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ResponsesRepository")
 */
class Responses
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
     * @ORM\Column(name="juste", type="integer")
     */
    private $juste;

    /**
     * @return Question
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @param Question $questions
     */
    public function setQuestions($questions=null)
    {
        $this->questions = $questions;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var Question
     *
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="responses",cascade={"persist"})
     * @ORM\JoinColumn(name="queries_id", referencedColumnName="id")
     */
    private $questions;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Responses
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return int
     */
    public function getJuste()
    {
        return $this->juste;
    }

    /**
     * @param int $juste
     */
    public function setJuste($juste)
    {
        $this->juste = $juste;
    }



}
