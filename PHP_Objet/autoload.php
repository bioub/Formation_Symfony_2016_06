<?php

$config = [
    'Ign\\' => __DIR__ . '/classes'
];

spl_autoload_register(function ($fqcn) use ($config) {
    
    foreach ($config as $prefix => $path) {
        if (strpos($fqcn, $prefix) === 0) {
            $fin = substr($fqcn, strlen($prefix));
            
            $classPath = $path . '/'. strtr($fin, '\\', '/') . '.php';

            if (file_exists($classPath)) {
                require_once $classPath;
            }
        }
    }
    
});