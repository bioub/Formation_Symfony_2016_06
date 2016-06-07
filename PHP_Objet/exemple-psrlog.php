<?php

require_once './vendor/autoload.php';

$filename = __DIR__ . '/log/app.log';
        
$logger = new \Ign\ExempleInterface\FileLogger($filename);
$logger->emergency('Pb de connexion à PostgreSQL');

$utilisatrice = new \Ign\UtiliseLogger($logger);
$utilisatrice->lamba();