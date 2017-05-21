<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

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
     * @return Aliment
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
     * @return Aliment
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
     * @var \Mathias\Bundle\CiqualBundle\Entity\FamilleAliment
     */
    private $famille;


    /**
     * Set famille
     *
     * @param \Mathias\Bundle\CiqualBundle\Entity\FamilleAliment $famille
     *
     * @return Aliment
     */
    public function setFamille(\Mathias\Bundle\CiqualBundle\Entity\FamilleAliment $famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \Mathias\Bundle\CiqualBundle\Entity\FamilleAliment
     */
    public function getFamille()
    {
        return $this->famille;
    }
}
