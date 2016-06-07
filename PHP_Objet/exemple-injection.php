<?php

use Ign\Heritage\FileWriter;
use Ign\InjectionDependance\FileLogger;

require_once './autoload.php';

$writer = new FileWriter(__DIR__ . '/log/app.log', 'a');
$logger = new FileLogger($writer);


$logger->log('Message injection');
