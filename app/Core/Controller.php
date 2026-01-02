<?php

namespace App\Core;

class Controller {
   protected function loadModel(string $model) : object
   {
      require_once __DIR__ . "/../Model/" . $model . ".php";
      $model = "App\\Model\\$model";
      return new $model();
   }

   protected function renderView(string $view, array $data = []) : void
   {
      extract($data);
      require_once __DIR__ . "/../View/" . $view . ".php";
   }
}