<?php

use Ign\Heritage\FileLogger;

require_once './autoload.php';

$logger = new FileLogger(__DIR__ . '/log/app.log');
$logger->log('Un héritage');

