<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

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
     * @var Collection
     */
    private $aliments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->aliments = new ArrayCollection();
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
     * @return FamilleAliment
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * Add aliment.yml
     *
     * @param Aliment $aliment
     *
     * @return FamilleAliment
     */
    public function addAliment(Aliment $aliment)
    {
        $this->aliments[] = $aliment->setFamille($this);

        return $this;
    }

    /**
     * Remove aliment.yml
     *
     * @param Aliment $aliment
     */
    public function removeAliment(Aliment $aliment)
    {
        $this->aliments->removeElement($aliment);
    }

    /**
     * Get aliments
     *
     * @return Collection
     */
    public function getAliments()
    {
        return $this->aliments;
    }
}
