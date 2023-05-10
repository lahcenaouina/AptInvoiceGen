<?php

namespace classes;
use PDO;
abstract class DBH
{
    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $hostname = "localhost";
            $DbName = "Clients";
            return new PDO("mysql:host=$hostname;dbname=$DbName" ,$username , $password);

        } catch (\PDOException $e) {
            print "Error : " . $e->getMessage();
            die();
        }
}

}