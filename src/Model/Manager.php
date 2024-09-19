<?php
    namespace App\Model;
    use PDO;
    use Exception;

    class Manager{
        private string $dbName = "blog2";
        private string $dbUser = "root";
        private string $dbPass = "";
        private string $dbHost = "localhost";
        private $bdd;

        protected function dbConnect()
        {
            if($this->bdd === NULL)
            {
               try{
                    $this->bdd = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName.";charset=utf8", $this->dbUser, $this->dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

               }catch(Exception $e)
               {
                die('ERREUR: '.$e->getMessage());
               }
            }

            return $this->bdd;
        }
    }