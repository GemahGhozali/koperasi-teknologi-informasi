<?php

namespace App\Middleware;

use App\Core\Middleware;

class AuthMiddleware implements Middleware {
   public function handle() : void
   {
      if (session_status() === PHP_SESSION_NONE) session_start();
      
      if (!isset($_SESSION["userId"])) {
         header("Location: /login");
         exit();
      }
   }
}