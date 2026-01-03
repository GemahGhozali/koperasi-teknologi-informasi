<?php

namespace App\Controller;

use App\Core\Controller;

class HomeController extends Controller {
   public function index() : void
   {
      session_start();
      
      $data = ["isAuthenticated" => false];
         
      if (isset($_SESSION["userId"])) {
         $userId = $_SESSION["userId"];

         $userModel = $this->loadModel("User");
         $user = $userModel->getUserById($userId);

         $data = [
            "isAuthenticated" => true,
            "nama" => $user["nama"],
            "avatarName" => $user["avatar"],
            "avatar" => "/uploads/img/" . $user["avatar"],
            "auth" => $user["auth"]
         ];
      }

      $this->renderView(view: "Home/index", data: $data);
   }
}