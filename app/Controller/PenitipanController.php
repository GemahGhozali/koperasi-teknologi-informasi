<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\PengajuanPenitipan;

class PenitipanController extends Controller {
   private PengajuanPenitipan $pengajuanPenitipanModel;

   public function __construct()
   {
      $this->pengajuanPenitipanModel = new PengajuanPenitipan();
   }

   public function index() : void
   {
      $applications = $this->pengajuanPenitipanModel->getAllPengajuanByUserId($_SESSION["userId"]);
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Penitipan/index", "applications" => $applications]);
   }
   
   public function showCreatePangajuanPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Penitipan/create-pengajuan"]);
   }

   public function save() : void
   {    
      $isSaveSuccess = $this->pengajuanPenitipanModel->createPengajuan(
         tanggal: $_POST["tanggal"],
         jenisBarang: $_POST["jenisBarang"],
         modalBarang: (int) $_POST["modalBarang"],
         jumlah: (int) $_POST["jumlah"],
         lamaPenitipan: (int) $_POST["lamaPenitipan"],
         userId: $_SESSION["userId"]
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/layanan-koperasi/penitipan/create");
         exit();
      }
      
      header("Location: /dashboard/layanan-koperasi/penitipan");
      exit();
   }

   public function delete(int $pengajuanId) : void 
   {
      $this->pengajuanPenitipanModel->deletePengajuan($pengajuanId);
      header("Location: /dashboard/layanan-koperasi/penitipan");
      exit();
   }

   public function review(int $pengajuanId) : void
   {
      $this->pengajuanPenitipanModel->changePengajuanStatus(id: $pengajuanId, status: "review");
      header("Location: /dashboard/pengajuan-layanan/penitipan");
      exit();
   }

   public function approve(int $pengajuanId) : void
   {
      $this->pengajuanPenitipanModel->changePengajuanStatus(id: $pengajuanId, status: "disetujui");
      header("Location: /dashboard/pengajuan-layanan/penitipan");
      exit();
   }

   public function reject(int $pengajuanId) : void
   {
      $this->pengajuanPenitipanModel->changePengajuanStatus(id: $pengajuanId, status: "ditolak");
      header("Location: /dashboard/pengajuan-layanan/penitipan");
      exit();
   }
}