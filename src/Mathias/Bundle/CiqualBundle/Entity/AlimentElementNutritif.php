<?php

namespace Mathias\Bundle\CiqualBundle\Entity;

/**
 * AlimentElementNutritif
 */
class AlimentElementNutritif
{
    /**
     * @var Aliment
     */
    private $aliment;
    /**
     * @var ElementNutritif
     */
    private $elementNutritif;
    /**
     * @var string
     */
    private $valeur;

    /**
     * Get aliment
     *
     * @return Aliment
     */
    public function getAliment()
    {
        return $this->aliment;
    }

    /**
     * Set aliment
     *
     * @param Aliment $aliment
     *
     * @return AlimentElementNutritif
     */
    public function setAliment(Aliment $aliment = null)
    {
        $this->aliment = $aliment;

        return $this;
    }

    /**
     * Get elementNutritif
     *
     * @return ElementNutritif
     */
    public function getElementNutritif()
    {
        return $this->elementNutritif;
    }

    /**
     * Set elementNutritif
     *
     * @param ElementNutritif $elementNutritif
     *
     * @return AlimentElementNutritif
     */
    public function setElementNutritif(ElementNutritif $elementNutritif = null)
    {
        $this->elementNutritif = $elementNutritif;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return AlimentElementNutritif
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }
}
