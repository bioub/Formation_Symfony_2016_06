<?php

namespace Ign\InjectionDependance;

use Ign\Heritage\FileWriter;

class FileLogger
{
    /**
     *
     * @var FileWriter
     */
    protected $writer;
    
    public function __construct(FileWriter $writer) {
        $this->writer = $writer;
    }
    
    public function log($msg)
    {
        $this->writer->write("$msg\n");
    }
}
