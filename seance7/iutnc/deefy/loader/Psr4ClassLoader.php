<?php

namespace Seance7\Iutnc\Deefy\Loader;

class Psr4ClassLoader
{
    private string $prefixe_namespace;
    private string $baseDir;

    function __construct(string $prefixe_namespace_p,string $baseDir_p ){
        $this->prefixe_namespace = $prefixe_namespace_p;
        $this->baseDir = $baseDir_p;
    }

    function loadClass(string $class_name){
        $relative_path = substr($class_name, strlen($this->prefixe_namespace));
        $file =  $this->baseDir . '/'.str_replace("\\", "/", $relative_path) . '.php';

       if (is_file( $file )) require_once($file);
    }

    function register(){
       spl_autoload_register([ $this,'loadClass']);
        
    }
}
