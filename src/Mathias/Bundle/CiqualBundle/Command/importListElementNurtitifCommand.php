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
        $csv = fgetcsv('D:\projets\ciqual\www\src\Mathias\Table_Ciqual_2016.csv');
        dump($csv);
    }
}
