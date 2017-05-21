<?php

namespace Mathias\Bundle\CiqualBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AlimentController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function rechercheAction()
    {
        return $this->render('MathiasCiqualBundle:aliment:recherche.html.twig');
    }
}
