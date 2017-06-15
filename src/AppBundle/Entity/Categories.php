<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     * @ORM\OneToMany(targetEntity="Qcm", mappedBy="cat",cascade={"persist"})

     */
    private $qcm;



    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Groups({"list", "details"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=false)

     * @Groups({"list", "details"})
     */
    private $name;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->qcm = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

    /**
     * Get qcm
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQcm()
    {
        return $this->qcm;
    }
}
