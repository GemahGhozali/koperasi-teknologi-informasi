<?php

namespace App\Config;

use PDO;

class Database {
   public static function getConnection() : PDO 
   {
      $servername = "localhost";
      $database = "koperasi";
      $username = "root";
      $password = "";
   
      return new PDO("mysql:host=$servername;dbname=$database", $username, $password);
   }
}
