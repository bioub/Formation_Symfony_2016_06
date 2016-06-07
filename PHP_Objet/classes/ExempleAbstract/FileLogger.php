<?php


namespace Ign\ExempleAbstract;


class FileLogger extends \Psr\Log\AbstractLogger
{
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
