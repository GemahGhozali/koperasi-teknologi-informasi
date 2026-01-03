<?php

namespace App\Middleware;

use App\Core\Middleware;
use App\Model\User;

class RoleMiddleware implements Middleware {
   public function __construct(private array $allowedRoles) {}

   public function handle() : void
   {
      if (session_status() === PHP_SESSION_NONE) session_start();

      $userModel = new User();
      $user = $userModel->getUserById($_SESSION["userId"]);

      if (!in_array($user["auth"], $this->allowedRoles)) {
         header("Location: /dashboard");
         exit();
      }
   }
}