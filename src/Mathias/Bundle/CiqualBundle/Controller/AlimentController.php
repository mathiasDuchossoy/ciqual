<?php

namespace Mathias\Bundle\CiqualBundle\Controller;

use Mathias\Bundle\CiqualBundle\Entity\Aliment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function getLikeAction(Request $request, $like)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository(Aliment::class)->findByLike($like);

        return new Response(json_encode($data));
    }
}
