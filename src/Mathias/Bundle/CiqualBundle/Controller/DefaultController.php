<?php

namespace Mathias\Bundle\CiqualBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MathiasCiqualBundle:Default:index.html.twig');
    }
}
