<?php

namespace App\Controller;

use App\Core\Controller;

class ContentNewsController extends Controller {
   public function index() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "ManageContent/News/index"]);
   }
}