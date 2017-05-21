<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

/**
 * ElementNutritif
 */
class ElementNutritif
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;


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
     * @return ElementNutritif
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }
}
