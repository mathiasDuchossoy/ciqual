<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

/**
 * FamilleAliment
 */
class FamilleAliment
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $nom;


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
     * Set code
     *
     * @param string $code
     *
     * @return FamilleAliment
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return FamilleAliment
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $aliments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aliments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add aliment
     *
     * @param \Mathias\Bundle\CiqualBundle\Entity\Aliment $aliment
     *
     * @return FamilleAliment
     */
    public function addAliment(\Mathias\Bundle\CiqualBundle\Entity\Aliment $aliment)
    {
        $this->aliments[] = $aliment;

        return $this;
    }

    /**
     * Remove aliment
     *
     * @param \Mathias\Bundle\CiqualBundle\Entity\Aliment $aliment
     */
    public function removeAliment(\Mathias\Bundle\CiqualBundle\Entity\Aliment $aliment)
    {
        $this->aliments->removeElement($aliment);
    }

    /**
     * Get aliments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAliments()
    {
        return $this->aliments;
    }
}
