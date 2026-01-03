<?php

namespace App\Controller;

use App\Core\Controller;

class AuthController extends Controller {
   public function showLoginPage() : void 
   {
      $this->renderView(view: "Auth/login");
   }

   public function showRegisterPage() : void 
   {
      $this->renderView(view: "Auth/register");
   }

   public function login() : void
   {
      session_start();
      
      $userModel = $this->loadModel("User");
      $user = $userModel->validateAccount(
         username: $_POST["username"],
         password: $_POST["password"],
         auth: $_POST["auth"]
      );

      if (!$user) {
         header("Location: /login");
         exit();
      }
      
      $_SESSION["userId"] = $user["id"];
      header("Location: /");
      exit();
   }
   
   public function logout() : void 
   {
      session_start();
      session_unset();
      session_destroy();

      header("Location: /");
      exit();
   }
}