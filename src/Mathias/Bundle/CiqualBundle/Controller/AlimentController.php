<?php

namespace Mathias\Bundle\CiqualBundle\Controller;

use Mathias\Bundle\CiqualBundle\Entity\Aliment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AlimentController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    /**
     * @return Response
     *
     * Page permettant d'accèder à la page de recherche d'un aliment
     */
    public function rechercheAction()
    {
        return $this->render('MathiasCiqualBundle:aliment:recherche.html.twig');
    }

    /**
     * @param $like
     * @return Response
     * fonction permettant de rechercher si la chaine de caractère récupéré est présente dans la table des aliments (nom)
     */
    public function getLikeAction($like)
    {
        $em = $this->getDoctrine()->getManager();
        // on fait appelle à la fonction de recherche présente dans le repository de l'entitée Aliment
        $data = $em->getRepository(Aliment::class)->findByLike($like);
        // on retourne le tableau encode en json afin qu'il soit traité dans le front
        return new Response(json_encode($data));
    }

    /**
     * @param Aliment $aliment
     * @return Response
     * fonction permettant de renvoyer les informations concernant l'aliment via son id
     */
    public function getInfosAction(Aliment $aliment)
    {
        // on renvoit le code html correspondant aux informations de l'aliment
        return $this->render('MathiasCiqualBundle:aliment:get-infos.html.twig', ['aliment' => $aliment]);
    }
}
