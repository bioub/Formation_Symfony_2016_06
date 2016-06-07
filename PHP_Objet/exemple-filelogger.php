<?php

use Ign\FileLogger;

require_once './classes/FileLogger.php';

// Ign\FileLogger : Fully Qualified ClassName (FQCN)
$logger = new FileLogger();
$logger->log('Un message');