<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Aliment
 */
class Aliment
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
     * @var FamilleAliment
     */
    private $famille;
    /**
     * @var Collection
     */
    private $alimentElementNutritifs;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alimentElementNutritifs = new ArrayCollection();
    }


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
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Aliment
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get famille
     *
     * @return FamilleAliment
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set famille
     *
     * @param FamilleAliment $famille
     *
     * @return Aliment
     */
    public function setFamille(FamilleAliment $famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Add alimentElementNutritif
     *
     * @param AlimentElementNutritif $alimentElementNutritif
     *
     * @return Aliment
     */
    public function addAlimentElementNutritif(AlimentElementNutritif $alimentElementNutritif)
    {
        $this->alimentElementNutritifs[] = $alimentElementNutritif;

        return $this;
    }

    /**
     * Remove alimentElementNutritif
     *
     * @param AlimentElementNutritif $alimentElementNutritif
     */
    public function removeAlimentElementNutritif(AlimentElementNutritif $alimentElementNutritif)
    {
        $this->alimentElementNutritifs->removeElement($alimentElementNutritif);
    }

    /**
     * Get alimentElementNutritifs
     *
     * @return Collection
     */
    public function getAlimentElementNutritifs()
    {
        return $this->alimentElementNutritifs;
    }

    public function __toString()
    {
        return $this->getNom();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Aliment
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

}
