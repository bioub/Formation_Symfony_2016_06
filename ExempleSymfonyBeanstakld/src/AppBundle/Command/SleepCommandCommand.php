<?php

namespace AppBundle\Command;

use Pheanstalk\Pheanstalk;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SleepCommandCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('diagnostique:geometrique')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $queue =  new Pheanstalk('localhost');

        $queue->watch('diag-geo-tube');

        while($job = $queue->reserve()) {
            $received = json_decode($job->getData(), true);
            $insee = $received['insee'];

            // simule le traitement long
            sleep(20);
            echo 'Traitement en cours - code insee : ' . $insee;

            // TODO notifier le client
            // exemple en envoyant un mail
            // ou WebSocket

            $queue->delete($job);
        }
    }

}
