<?php

namespace Mathias\Bundle\CiqualBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class importListElementNurtitifCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('mathias_ciqual:import_list_element_nurtitif_command')
            ->setDescription('Hello PhpStorm');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $connection = $this->getContainer()->get('doctrine')->getConnection();

//        ->query('SHOW TABLES');
        $fopen = fopen('D:\projets\ciqual\www\src\Mathias\Table_Ciqual_2016.csv' , 'r');
//        dump($fopen);
//        die;
        $premiereLigneArray = fgetcsv($fopen , null, ';');
        for ($i = 4; $i < sizeof($premiereLigneArray) ; $i++) {
            echo ($premiereLigneArray[$i]);

        }
        dump($premiereLigneArray);
    }
}
