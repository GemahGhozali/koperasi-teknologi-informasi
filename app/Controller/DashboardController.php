<?php

namespace App\Controller;

use App\Core\Controller;

class DashboardController extends Controller {
   public function index() : void
   {
      $this->renderView(view: "Dashboard/index");
   }

   public function showManageContentPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "ManageContent/index"]);
   }

   public function showLayananKoperasiPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/index"]);
   }
}