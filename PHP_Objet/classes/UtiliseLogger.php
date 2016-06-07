<?php

namespace Ign;


class UtiliseLogger
{
    /**
     *
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
    
    public function __construct(\Psr\Log\LoggerInterface $logger) {
        $this->logger = $logger;
    }
    
    public function lamba()
    {
        // traitement
        $this->logger->info('appel de la fonction lambda');
    }
}
