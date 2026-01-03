<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class PengajuanPegadaian {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllPengajuan() : array
   {
      $sql = "SELECT * FROM pengajuan_pegadaian";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getAllPengajuanByUserId(int $userId) : array
   {
      $sql = "SELECT * FROM pengajuan_pegadaian WHERE user_id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$userId]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function createPengajuan(string $tanggal, string $jenis, string $informasi, int $nilai, string $dokumen, string $keterangan, int $userId) : bool
   {
      $sql = "INSERT INTO pengajuan_pegadaian (tanggal, jenis, informasi, nilai, dokumen, keterangan, user_id)
              VALUES (:tanggal, :jenis, :informasi, :nilai, :dokumen, :keterangan, :userId)";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":tanggal"     => $tanggal,
         ":jenis"       => $jenis,
         ":informasi"   => $informasi,
         ":nilai"       => $nilai,
         ":dokumen"     => $dokumen,
         ":keterangan"  => $keterangan,
         ":userId"      => $userId,
      ]);
   }

   public function deletePengajuan(int $id): bool
   {
      $sql = "DELETE FROM pengajuan_pegadaian WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function changePengajuanStatus(int $id, string $status) : bool
   {
      $sql = "UPDATE pengajuan_pegadaian SET status = :status WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":status"  => $status,
         ":id"     => $id,
      ]);
   }
}
