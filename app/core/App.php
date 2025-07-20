

<?php

namespace App\Core;


use Symfony\Component\Yaml\Yaml;

use function App\Config\dd;

class App{
      private static array $instancies=[];
    
      public static function getDependencies(string $nomClass){
            // $dependencies= require __DIR__ . "/../config/dependencies.php";
            $dependencies=Yml::parseFile( __DIR__ . '/../config/service.yml');
          
            if(array_key_exists($nomClass, self::$instancies)){
                    return self::$instancies[$nomClass];        
            }

            foreach($dependencies as $packages){
                if(isset($packages[$nomClass])){
                    $class= $packages[$nomClass];
                    if(class_exists($class)){
                            $instance=$class::getInstance();
                            if($instance){
                            self::$instancies[$nomClass]=$instance;
                            return $instance;
                            }
                    }
                }
            }
            return null;
      }

}