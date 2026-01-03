<?php

namespace App\Controller;

use App\Core\Controller;

class PengajuanLayanan extends Controller {
   public function showPengajuanPegadaianPage() : void
   {
      $pengajuanPegadaianModel = $this->loadModel("PengajuanPegadaian");
      $applications = $pengajuanPegadaianModel->getAllPengajuan();

      if (isset($_GET["status"])) {
         $applications = array_filter($applications, fn($application) => $application["status"] === $_GET["status"]);
      }

      $this->renderView(view: "Dashboard/index", data: ["page" => "PengajuanLayanan/index", "currentTab" => "Pegadaian", "data" => $applications]);
   }

   public function showPengajuanPeminjamanPage() : void
   {
      $pengajuanPeminjamanModel = $this->loadModel("PengajuanPeminjaman");
      $applications = $pengajuanPeminjamanModel->getAllPengajuan();

      if (isset($_GET["status"])) {
         $applications = array_filter($applications, fn($application) => $application["status"] === $_GET["status"]);
      }

      $this->renderView(view: "Dashboard/index", data: ["page" => "PengajuanLayanan/index", "currentTab" => "Peminjaman", "data" => $applications]);
   }

   public function showPengajuanPenitipanPage() : void
   {
      $pengajuanPenitipanModel = $this->loadModel("PengajuanPenitipan");
      $applications = $pengajuanPenitipanModel->getAllPengajuan();

      if (isset($_GET["status"])) {
         $applications = array_filter($applications, fn($application) => $application["status"] === $_GET["status"]);
      }

      $this->renderView(view: "Dashboard/index", data: ["page" => "PengajuanLayanan/index", "currentTab" => "Penitipan", "data" => $applications]);
   }
}