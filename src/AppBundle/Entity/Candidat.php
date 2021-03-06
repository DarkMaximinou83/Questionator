<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Candidat
 *
 * @ORM\Table(name="candidat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CandidatRepository")
 */
class Candidat
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
     * @ORM\Column(name="id_qcm", type="integer")
     */
    private $idQcm;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat", type="string", length=255)
     */
    private $resultat;

    /**
     * @var string
     *
     * @ORM\Column(name="nb_Rjuste", type="string", length=255)
     */
    private $nbRjuste;


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
     * @return Candidat
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
     * Set resultat
     *
     * @param string $resultat
     *
     * @return Candidat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * Set nbRjuste
     *
     * @param string $nbRjuste
     *
     * @return Candidat
     */
    public function setNbRjuste($nbRjuste)
    {
        $this->nbRjuste = $nbRjuste;

        return $this;
    }

    /**
     * Get nbRjuste
     *
     * @return string
     */
    public function getNbRjuste()
    {
        return $this->nbRjuste;
    }
}
