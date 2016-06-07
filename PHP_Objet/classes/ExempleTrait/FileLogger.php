<?php

namespace Ign\ExempleTrait;

class FileLogger implements \Psr\Log\LoggerInterface
{
    use \Psr\Log\LoggerTrait;
    
    protected $file;
    
    public function __construct($filename) {
        $this->file = fopen($filename, 'a');
    }
    
    public function __destruct() {
        fclose($this->file);
    }
    
    public function log($level, $message, array $context = array()) {
        // [warning] 2016-06-07 12:45:12 - Mon message
        $msg = "[$level] " . date(DATE_W3C) . " - $message\n";
        fwrite($this->file, $msg);
    }
}
