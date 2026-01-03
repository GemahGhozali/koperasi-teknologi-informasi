<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class PengajuanPeminjaman {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllPengajuan() : array
   {
      $sql = "SELECT * FROM pengajuan_peminjaman";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getAllPengajuanByUserId(int $userId) : array
   {
      $sql = "SELECT * FROM pengajuan_peminjaman WHERE user_id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$userId]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function createPengajuan(string $tanggal, int $besarPinjaman, string $keperluan, string $jaminan, string $buktiJaminan, int $lamaPeminjaman, string $keterangan, int $userId) : bool
   {
      $sql = "INSERT INTO pengajuan_peminjaman (tanggal, besar_pinjaman, keperluan,
              jaminan, bukti_jaminan, lama_peminjaman, keterangan, user_id)
              VALUES (:tanggal, :besarPinjaman, :keperluan, :jaminan, :buktiJaminan, :lamaPeminjaman, :keterangan, :userId)";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":tanggal"         => $tanggal,
         ":besarPinjaman"   => $besarPinjaman,
         ":keperluan"       => $keperluan,
         ":jaminan"         => $jaminan,
         ":buktiJaminan"    => $buktiJaminan,
         ":lamaPeminjaman"  => $lamaPeminjaman,
         ":keterangan"      => $keterangan,
         ":userId"          => $userId,
      ]);
   }

   public function deletePengajuan(int $id): bool
   {
      $sql = "DELETE FROM pengajuan_peminjaman WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function changePengajuanStatus(int $id, string $status) : bool
   {
      $sql = "UPDATE pengajuan_peminjaman SET status = :status WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":status"  => $status,
         ":id"     => $id,
      ]);
   }
}
