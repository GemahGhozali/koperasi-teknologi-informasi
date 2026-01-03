<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\PengajuanPegadaian;
use App\Utils\FileHandler;

class PegadaianController extends Controller {
   private PengajuanPegadaian $pengajuanPegadaianModel;

   public function __construct()
   {
      $this->pengajuanPegadaianModel = new PengajuanPegadaian();
   }

   public function index() : void
   {
      $applications = $this->pengajuanPegadaianModel->getAllPengajuanByUserId($_SESSION["userId"]);
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Pegadaian/index", "applications" => $applications]);
   }
   
   public function showCreatePangajuanPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Pegadaian/create-pengajuan"]);
   }

   public function save() : void
   {
      $dokumen = $_FILES["dokumen"];

      // Validasi 1 : Jika user tidak mengupload file apapun => Set nama file ke null (untuk trigger error)
      if ($dokumen["error"] == UPLOAD_ERR_NO_FILE) {
         $dokumen = null;
      }
      // Validasi 2 : Jika user mengupload file => Coba pindahkan file dokumen ke directory local
      else if ($dokumen["error"] == UPLOAD_ERR_OK) {
         $dokumen = FileHandler::uploadPdf(
            file: $dokumen,
            targetDirectory: __DIR__ . "/../../public/uploads/document/",
         );
      }

      // Jika upload file gagal / file dokumen null => Kembali ke halaman buat pengajuan
      if (!$dokumen) {
         header("Location: /dashboard/layanan-koperasi/pegadaian/create");
         exit();
      }
      
      $isSaveSuccess = $this->pengajuanPegadaianModel->createPengajuan(
         tanggal: $_POST["tanggal"],
         jenis: $_POST["jenis"],
         informasi: $_POST["informasi"],
         nilai: (int) $_POST["nilai"],
         dokumen: $dokumen,
         keterangan: $_POST["keterangan"],
         userId: $_SESSION["userId"]
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/layanan-koperasi/pegadaian/create");
         exit();
      }
      
      header("Location: /dashboard/layanan-koperasi/pegadaian");
      exit();
   }

   public function delete(int $pengajuanId) : void 
   {
      $this->pengajuanPegadaianModel->deletePengajuan($pengajuanId);
      header("Location: /dashboard/layanan-koperasi/pegadaian");
      exit();
   }

   public function review(int $pengajuanId) : void
   {
      $this->pengajuanPegadaianModel->changePengajuanStatus(id: $pengajuanId, status: "review");
      header("Location: /dashboard/pengajuan-layanan");
      exit();
   }

   public function approve(int $pengajuanId) : void
   {
      $this->pengajuanPegadaianModel->changePengajuanStatus(id: $pengajuanId, status: "disetujui");
      header("Location: /dashboard/pengajuan-layanan");
      exit();
   }

   public function reject(int $pengajuanId) : void
   {
      $this->pengajuanPegadaianModel->changePengajuanStatus(id: $pengajuanId, status: "ditolak");
      header("Location: /dashboard/pengajuan-layanan");
      exit();
   }
}