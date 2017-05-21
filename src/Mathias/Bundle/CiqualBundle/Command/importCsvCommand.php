<?php

namespace Mathias\Bundle\CiqualBundle\Command;

use Doctrine\Common\Collections\ArrayCollection;
use Mathias\Bundle\CiqualBundle\Entity\Aliment;
use Mathias\Bundle\CiqualBundle\Entity\AlimentElementNutritif;
use Mathias\Bundle\CiqualBundle\Entity\ElementNutritif;
use Mathias\Bundle\CiqualBundle\Entity\FamilleAliment;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class importCsvCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('mathias_ciqual:import_csv_command')
            ->setDescription('Commande permettant d\'importer les données du fichier csv dans la bdd.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // récupérer l'entityManager
        $em = $this->getContainer()->get('doctrine')->getManager();
        // Ouvrir le fichier csv en lecture
        $fopen = fopen(__DIR__ . '\..\..\..\Table_Ciqual_2016.csv', 'r');

        // on déclare un tableau pour récupérer toute les éléments nutritif créé pour les réutiliser plus tard
        $elementNutritifs = new ArrayCollection();
        // récupérer la première ligne du csv
        $premiereLigneArray = fgetcsv($fopen, null, ';');
        // on commence à boucler à partir du  4ème index car c'est là que commence les infos pour les élements nutritif
        for ($i = 4; $i < sizeof($premiereLigneArray); $i++) {
            // on déclare un nouveau élément nutritif
            $elementNutritif = new ElementNutritif();
            // on lui donne son nom correspondant
            $elementNutritif->setNom(utf8_encode($premiereLigneArray[$i]));
            // on persiste l'entité pour qu'elle soit gérée par doctrine
            $em->persist($elementNutritif);
            // on ajoute l'entitée au tableau pour les réutiliser plus tard
            $elementNutritifs->add($elementNutritif);
        }

        // on déclare un tableau des familles pour pouvoir vérifier si la famille n'a pas été déjà persisté
        $familles = new ArrayCollection();
        // on continue à parcourir le fichier csv
        while (($ligne = $ligne = fgetcsv($fopen, null, ';')) !== false) {
            // on récupère la famille si elle a déjà été créé sinon on retourne 'false'
            $famille = $familles->filter(function (FamilleAliment $element) use ($ligne) {
                return $element->getCode() == $ligne[0];
            })->first();
            // si on ne trouve pas la famille on va la créé
            if (false === $famille) {
                // on déclare l'entité
                $famille = new FamilleAliment();
                // on lui attribue ses données
                $famille
                    ->setCode($ligne[0])
                    ->setNom(utf8_encode($ligne[1]));
            }
            // on cré une nouvelle entitée Aliment
            $aliment = new Aliment();
            // on lui attribue ses données
            $aliment
                ->setCode($ligne[2])
                ->setNom(utf8_encode($ligne[3]));
            // on ajoute l'aliment à la famille correspondante
            $famille->addAliment($aliment);
            // on déclareune variable $j à 0 pour pouvoir récupérer le bon élément nutritif correspondant dans le tableau $elementNutritifs
            $j = 0;
            // on continue de parcourir le tableau à partir de l'indice 4 (les infos pour les éléments nutritifs commencent à cette indice)
            for ($i = 4; $i < sizeof($ligne); $i++) {
                // on créé une nouvelle entité AlimentElementNutritif
                $alimentElementNutritif = new AlimentElementNutritif();
                // on lui attribue ses données
                $alimentElementNutritif
                    ->setElementNutritif($elementNutritifs->get($j))
                    ->setValeur(utf8_encode($ligne[$i]))
                    ->setAliment($aliment);
                // on ajoute la nouvelle entité à son aliment correspondant
                $aliment->addAlimentElementNutritif($alimentElementNutritif);
                // on incrémente $j pour continuer à parcourir le tableau des élements utritifs
                $j++;
            }
            // on persiste l'entité pour qu'elle soit gérée par doctrine
            $em->persist($famille);
            // on enregistre les données persisté en base de données, on pourrait n'en faire qu'un seul à la fin
            // mais je souhaitais voir l'apparition des données au fils de l'eau
            $em->flush();
            // on ajoute la famille au tableau pour pouvoir vérifier s'il n'a pas été déjà été créé
            $familles->add($famille);
        }
        // on pourrait faire un seul flush général
        // $em->flush();
    }
}
