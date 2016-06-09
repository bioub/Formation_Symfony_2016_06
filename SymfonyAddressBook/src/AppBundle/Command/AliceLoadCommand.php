<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AliceLoadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('alice:load')
            ->setDescription('...')
            ->addArgument('fixturePath', InputArgument::REQUIRED, 'Argument description')
            ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $entityManager = $this->getContainer()->get('doctrine.orm.entity_manager');
        
        $fixturePath = $input->getArgument('fixturePath');

        \Nelmio\Alice\Fixtures::load($fixturePath, $entityManager, [
            'locale' => 'fr_FR',
            'seed' => time()
            ]);

        $output->writeln('Entités insérées.');
    }

}
