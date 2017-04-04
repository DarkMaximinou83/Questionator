<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="Rjuste", type="string", length=255)
     */
    private $rjuste;


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
     * Set rjuste
     *
     * @param string $rjuste
     *
     * @return Question
     */
    public function setRjuste($rjuste)
    {
        $this->rjuste = $rjuste;

        return $this;
    }

    /**
     * Get rjuste
     *
     * @return string
     */
    public function getRjuste()
    {
        return $this->rjuste;
    }
}
