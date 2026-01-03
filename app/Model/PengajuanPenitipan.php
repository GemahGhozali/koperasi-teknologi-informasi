<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class PengajuanPenitipan {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllPengajuan() : array
   {
      $sql = "SELECT * FROM pengajuan_penitipan";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getAllPengajuanByUserId(int $userId) : array
   {
      $sql = "SELECT * FROM pengajuan_penitipan WHERE user_id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$userId]);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function createPengajuan(string $tanggal, string $jenisBarang, int $modalBarang, int $jumlah, int $lamaPenitipan, int $userId) : bool
   {
      $sql = "INSERT INTO pengajuan_penitipan (tanggal, jenis_barang, modal_barang, jumlah, lama_penitipan, user_id)
              VALUES (:tanggal, :jenisBarang, :modalBarang, :jumlah, :lamaPenitipan, :userId)";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":tanggal"        => $tanggal,
         ":jenisBarang"    => $jenisBarang,
         ":modalBarang"    => $modalBarang,
         ":jumlah"         => $jumlah,
         ":lamaPenitipan"  => $lamaPenitipan,
         ":userId"         => $userId,
      ]);
   }

   public function deletePengajuan(int $id): bool
   {
      $sql = "DELETE FROM pengajuan_penitipan WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function changePengajuanStatus(int $id, string $status) : bool
   {
      $sql = "UPDATE pengajuan_penitipan SET status = :status WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":status"  => $status,
         ":id"     => $id,
      ]);
   }
}
