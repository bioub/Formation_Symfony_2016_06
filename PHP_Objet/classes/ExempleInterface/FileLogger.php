<?php

namespace Ign\ExempleInterface;


class FileLogger implements \Psr\Log\LoggerInterface
{
    protected $file;
    
    public function __construct($filename) {
        $this->file = fopen($filename, 'a');
    }
    
    public function __destruct() {
        fclose($this->file);
    }
    
    public function alert($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::ALERT, $message);
    }

    public function critical($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::CRITICAL, $message);
    }

    public function debug($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::DEBUG, $message);
    }

    public function emergency($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::EMERGENCY, $message);
    }

    public function error($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::ERROR, $message);
    }

    public function info($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::INFO, $message);
    }

    public function log($level, $message, array $context = array()) {
        // [warning] 2016-06-07 12:45:12 - Mon message
        $msg = "[$level] " . date(DATE_W3C) . " - $message\n";
        fwrite($this->file, $msg);
    }

    public function notice($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::NOTICE, $message);
    }

    public function warning($message, array $context = array()) {
        $this->log(\Psr\Log\LogLevel::WARNING, $message);
    }

}
