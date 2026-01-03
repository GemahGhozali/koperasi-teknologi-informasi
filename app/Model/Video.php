<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class Video {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllVideos() : array
   {
      $sql = "SELECT * FROM videos WHERE hapus != 1";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getVideoById(int $id) : ?array
   {
      $sql = "SELECT * FROM videos WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$id]);
      $video = $stmt->fetch(PDO::FETCH_ASSOC);
      return $video ?: null;
   }

   public function createVideo(string $kodeVideo, string $keterangan) : bool
   {
      $sql = "INSERT INTO videos (kode_video, keterangan) VALUES (:kodeVideo, :keterangan)";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":kodeVideo"   => $kodeVideo,
         ":keterangan"  => $keterangan,
      ]);
   }

   public function deleteVideo(int $id): bool
   {
      $sql = "UPDATE videos SET hapus = 1 WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function editVideo(int $id, string $kodeVideo, string $keterangan) : bool
   {
      $sql = "UPDATE videos SET kode_video = :kodeVideo, keterangan = :keterangan WHERE id = :id";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":kodeVideo"   => $kodeVideo,
         ":keterangan"  => $keterangan,
         ":id"          => $id,
      ]);
   }

   public function changeVideoActiveStatus(int $id, int $status) : bool
   {
      $sql = "UPDATE videos SET aktif = :aktif WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":aktif"  => $status,
         ":id"     => $id,
      ]);
   }
}
