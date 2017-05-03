<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriesRepository")
 */
class Categories
{


    /**
     * One Product has Many Features.
     * @ORM\OneToMany(targetEntity="Qcm", mappedBy="cat")
     */
    private $qcm;



    /**
     * @var int
     *
     * @ORM\Column(name="IdCat", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $idCat;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = 0,
     *      max = 50,
     *      minMessage = "Votre username doit faire au moins {{ limit }} characteres",
     *      maxMessage = "Votre username ne peut pas dépasser {{ limit }} characteres"
     * )
     */
    private $name;


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
     * Set idQcm
     *
     * @param integer $idQcm
     *
     * @return Categories
     */
    public function setIdQcm($idQcm)
    {
        $this->idQcm = $idQcm;

        return $this;
    }

    /**
     * Get idQcm
     *
     * @return int
     */
    public function getIdQcm()
    {
        return $this->idQcm;
    }

    /**
     * Set idCat
     *
     * @param integer $idCat
     *
     * @return Categories
     */
    public function setIdCat($idCat)
    {
        $this->idCat = $idCat;

        return $this;
    }

    /**
     * Get idCat
     *
     * @return int
     */
    public function getIdCat()
    {
        return $this->idCat;
    }

    /**
     * Set name
     *
     * @param integer $name
     *
     * @return Categories
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return int
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getQcm()
    {
        return $this->qcm;
    }

    /**
     * @param mixed $qcm
     */
    public function setQcm($qcm)
    {
        $this->qcm = $qcm;
    }

}

