<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

/**
 * Qcm
 *
 * @ORM\Table(name="qcm")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QcmRepository")
 */
class Qcm
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
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="qcm" ,cascade={"persist"})
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="id")
     * @Groups({"details"})
     */
    private $cat;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var Question
     *
     * @ORM\OneToMany(targetEntity="Question", mappedBy="qcm", cascade={"all"})
     *
     * @Groups({"details"})
     */
    private $question;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->question = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
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
     * @return Qcm
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
     * Set cat
     *
     * @param \AppBundle\Entity\Categories $cat
     *
     * @return Qcm
     */
    public function setCat(\AppBundle\Entity\Categories $cat = null)
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get cat
     *
     * @return \AppBundle\Entity\Categories
     */
    public function getCat()
    {
        return $this->cat;
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     *
     * @return Qcm
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $this->question[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->question->removeElement($question);
    }

    /**
     * Get question
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
