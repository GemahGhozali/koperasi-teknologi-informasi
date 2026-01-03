<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\PengajuanPeminjaman;
use App\Utils\FileHandler;

class PeminjamanController extends Controller {
   private PengajuanPeminjaman $pengajuanPeminjamanModel;

   public function __construct()
   {
      $this->pengajuanPeminjamanModel = new PengajuanPeminjaman();
   }

   public function index() : void
   {
      $applications = $this->pengajuanPeminjamanModel->getAllPengajuanByUserId($_SESSION["userId"]);
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Peminjaman/index", "applications" => $applications]);
   }
   
   public function showCreatePangajuanPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "LayananKoperasi/Peminjaman/create-pengajuan"]);
   }

   public function save() : void
   {
      $buktiJaminan = $_FILES["buktiJaminan"];

      // Validasi 1 : Jika user tidak mengupload file apapun => Set nama file ke null (untuk trigger error)
      if ($buktiJaminan["error"] == UPLOAD_ERR_NO_FILE) {
         $buktiJaminan = null;
      }
      // Validasi 2 : Jika user mengupload file => Coba pindahkan file dokumen ke directory local
      else if ($buktiJaminan["error"] == UPLOAD_ERR_OK) {
         $buktiJaminan = FileHandler::uploadPdf(
            file: $buktiJaminan,
            targetDirectory: __DIR__ . "/../../public/uploads/document/",
         );
      }

      // Jika upload file gagal / file dokumen null => Kembali ke halaman buat pengajuan
      if (!$buktiJaminan) {
         header("Location: /dashboard/layanan-koperasi/peminjaman/create");
         exit();
      }
      
      $isSaveSuccess = $this->pengajuanPeminjamanModel->createPengajuan(
         tanggal: $_POST["tanggal"],
         besarPinjaman: (int) $_POST["besarPinjaman"], 
         keperluan: $_POST["keperluan"], 
         jaminan: $_POST["jaminan"], 
         buktiJaminan: $buktiJaminan, 
         lamaPeminjaman: (int) $_POST["lamaPeminjaman"],
         keterangan: $_POST["keterangan"],
         userId: $_SESSION["userId"]
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/layanan-koperasi/peminjaman/create");
         exit();
      }
      
      header("Location: /dashboard/layanan-koperasi/peminjaman");
      exit();
   }

   public function delete(int $pengajuanId) : void 
   {
      $this->pengajuanPeminjamanModel->deletePengajuan($pengajuanId);
      header("Location: /dashboard/layanan-koperasi/peminjaman");
      exit();
   }

   public function review(int $pengajuanId) : void
   {
      $this->pengajuanPeminjamanModel->changePengajuanStatus(id: $pengajuanId, status: "review");
      header("Location: /dashboard/pengajuan-layanan/peminjaman");
      exit();
   }

   public function approve(int $pengajuanId) : void
   {
      $this->pengajuanPeminjamanModel->changePengajuanStatus(id: $pengajuanId, status: "disetujui");
      header("Location: /dashboard/pengajuan-layanan/peminjaman");
      exit();
   }

   public function reject(int $pengajuanId) : void
   {
      $this->pengajuanPeminjamanModel->changePengajuanStatus(id: $pengajuanId, status: "ditolak");
      header("Location: /dashboard/pengajuan-layanan/peminjaman");
      exit();
   }
}