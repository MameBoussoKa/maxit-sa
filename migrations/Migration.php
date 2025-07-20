<?php

namespace Migrations;

use Exception;
use \PDO;
use \PDOException;

class Migration{
    
        
    private PDO $pdo;
    private string $driver;

    public function __construct(PDO $pdo){

        $this->pdo=$pdo;
        $this->driver=$pdo->getAttribute(PDO::ATTR_DRIVER_NAME);

    }


    public function run(){
                $this->createDatabase();
                $this->creataTables();
                echo 'migration réussi';
    }


    private function createDatabase(){
                if($this->driver=== "mysql"){
                    $this->pdo->exec("CREATE DATABASE IF NOT EXISTS " ."maxit-sa");
                    $this->pdo->exec("USE " ."maxit-sa");
                }elseif($this->driver=== "pgsql"){
                     try {
                            $pdo= new PDO("pgsql:host=127.0.0.1;port=5432;dbname=postgres", "postgres","mame",[
                                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
                            ]);
                            $stmt = $pdo->prepare("SELECT 1 FROM pg_database WHERE datname = :dbname");
                            $stmt->execute([':dbname' => "DB_NAME"]);

                            if ($stmt->fetch()) {
                                echo "La base de données '" ."maxit-sa" . "' existe déjà.\n";
                            } else {
                                // Création de la base
                                $pdo->exec('CREATE DATABASE "' ."maxit-sa" . '"');
                                echo "Base de données '" ."maxit-sa" . "' créée avec succès.\n";
                            }
                            
                     } catch (PDOException $e) {
                        throw $e;
                     }   
                }
    }


    private function creataTables(){
         $sql=match($this->driver){
            'mysql'=>file_get_contents(__DIR__ . '/../databases/script_create_mysql.sql'),
            'pgsql'=>file_get_contents(__DIR__ . '/../databases/script_create_postgres.sql'),
            default => throw new Exception('driver non supporté ' .$this->driver)
         };

         $this->pdo->exec($sql);
    }


    

}



