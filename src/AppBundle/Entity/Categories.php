<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation\Groups;

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
     * @ORM\ManyToMany(targetEntity="Qcm", mappedBy="cat")
     */
    private $qcm;



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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     * @Assert\Length(
     *      min = 0,
     *      max = 50,
     *      minMessage = "Votre username doit faire au moins {{ limit }} characteres",
     *      maxMessage = "Votre username ne peut pas dépasser {{ limit }} characteres"
     * )
     * @Groups({"list", "details"})
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

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->qcm = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add qcm
     *
     * @param \AppBundle\Entity\Qcm $qcm
     *
     * @return Categories
     */
    public function addQcm(\AppBundle\Entity\Qcm $qcm)
    {
        $this->qcm[] = $qcm;

        return $this;
    }

    /**
     * Remove qcm
     *
     * @param \AppBundle\Entity\Qcm $qcm
     */
    public function removeQcm(\AppBundle\Entity\Qcm $qcm)
    {
        $this->qcm->removeElement($qcm);
    }
}
