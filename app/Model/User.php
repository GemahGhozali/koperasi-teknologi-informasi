<?php

namespace App\Model;

use PDO;
use App\Config\Database;

class User {
   private PDO $db;

   public function __construct()
   {
      $this->db = Database::getConnection();
   }

   public function getAllUsers() : array
   {
      $sql = "SELECT * FROM users WHERE hapus != 1";
      $stmt = $this->db->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getUserById(int $id) : ?array
   {
      $sql = "SELECT * FROM users WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      $stmt->execute([$id]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user ?: null;
   }

   public function createUser(string $nama, string $username, string $password, string $auth, string $avatar, string $keterangan) : bool
   {
      $sql = "INSERT INTO users (nama, username, password, auth, avatar, keterangan)
              VALUES (:nama, :username, :password, :auth, :avatar, :keterangan)";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":nama"        => $nama,
         ":username"    => $username,
         ":password"    => $password,
         ":auth"        => $auth,
         ":avatar"      => $avatar,
         ":keterangan"  => $keterangan,
      ]);
   }

   public function deleteUser(int $id): bool
   {
      $sql = "UPDATE users SET hapus = 1 WHERE id = ?";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([$id]);
   }

   public function editUser(int $id, string $nama, string $username, string $password, string $auth, string $avatar, string $keterangan) : bool
   {
      $sql = "UPDATE users 
              SET nama = :nama, username = :username, password = :password, 
                  auth = :auth, avatar = :avatar, keterangan = :keterangan 
              WHERE id = :id";

      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":id"          => $id,
         ":nama"        => $nama,
         ":username"    => $username,
         ":password"    => $password,
         ":auth"        => $auth,
         ":avatar"      => $avatar,
         ":keterangan"  => $keterangan,
      ]);
   }

   public function validateAccount(string $username, string $password, string $auth) : array | bool
   {
      $sql = "SELECT * FROM users 
              WHERE username = :username AND password = :password AND auth = :auth AND aktif = 1";

      $stmt = $this->db->prepare($sql);
      $stmt->execute([
         ":username"  => $username, 
         ":password"  => $password,
         ":auth"      => $auth,
      ]);
      
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      return $user ?: false;
   }

   public function changeUserActiveStatus(int $id, int $status) : bool
   {
      $sql = "UPDATE users SET aktif = :aktif WHERE id = :id";
      $stmt = $this->db->prepare($sql);
      return $stmt->execute([
         ":aktif"  => $status,
         ":id"     => $id,
      ]);
   }
}
