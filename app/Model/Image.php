<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class Image {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllImages() : array
   {
      $sql = "SELECT * FROM images WHERE hapus != 1";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getImageById(int $id) : ?array
   {
      $sql = "SELECT * FROM images WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$id]);
      $image = $stmt->fetch(PDO::FETCH_ASSOC);
      return $image ?: null;
   }

   public function createImage(string $namaFile, string $keterangan) : bool
   {
      $sql = "INSERT INTO images (nama_file, keterangan) VALUES (:namaFile, :keterangan)";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":namaFile"    => $namaFile,
         ":keterangan"  => $keterangan,
      ]);
   }

   public function deleteImage(int $id): bool
   {
      $sql = "UPDATE images SET hapus = 1 WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function editImage(int $id, string $namaFile, string $keterangan) : bool
   {
      $sql = "UPDATE images SET nama_file = :namaFile, keterangan = :keterangan WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":namaFile"    => $namaFile,
         ":keterangan"  => $keterangan,
         ":id"          => $id,
      ]);
   }

   public function changeImageActiveStatus(int $id, int $status) : bool
   {
      $sql = "UPDATE images SET aktif = :aktif WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":aktif"  => $status,
         ":id"     => $id,
      ]);
   }
}
