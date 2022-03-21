<?php
namespace CT275\Labs;
/* require_once "../public/bootstrap.php"; */

use PDO; 

class PDOFactory {
    public function create(array $config) {
        [
            'dbhost' => $dbhost,
            'dbname' => $dbname,
            'dbuser' => $dbuser,
            'dbpass' => $dbpass
        ] = $config;

       return new PDO('mysql:host=localhost;dbname=ct275_lab4','root','');
    }
}