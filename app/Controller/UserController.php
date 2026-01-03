<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\User;
use App\Utils\FileHandler;

class UserController extends Controller {
   private User $userModel;

   public function __construct()
   {
      $this->userModel = new User();
   }
   
   public function index() : void
   {
      $users = $this->userModel->getAllUsers();
      $data = [
         "page" => "ManageUser/index",
         "users" => array_filter($users, fn($user) => $user["auth"] !== "administrator"),
      ];

      $this->renderView(view: "Dashboard/index", data: $data);
   }

   public function showCreateUserPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "ManageUser/create-user"]);
   }

   public function showEditUserPage(int $userId) : void
   {
      $user = $this->userModel->getUserById($userId);
      $data = [
         "page" => "ManageUser/edit-user",
         "id" => $user["id"],
         "nama" => $user["nama"],
         "username" => $user["username"],
         "password" => $user["password"],
         "auth" => $user["auth"],
         "keterangan" => $user["keterangan"],
         "avatar" => "/uploads/img/" . $user["avatar"],
         "avatarName" => $user["avatar"],
      ];
      $this->renderView(view: "Dashboard/index", data: $data);
   }
   
   public function save() : void
   {
      $avatar = $_FILES["avatar"];

      // Validasi 1 : Jika user tidak mengupload file apapun => Gunakan gambar avatar placeholder
      if ($avatar["error"] == UPLOAD_ERR_NO_FILE) {
         $avatar = "avatar-placeholder.png";
      }
      // Validasi 2 : Jika user mengupload avatar => Coba pindahkan file avatar ke directory local
      else if ($avatar["error"] == UPLOAD_ERR_OK) {
         $avatar = FileHandler::uploadImage(
            file: $avatar,
            targetDirectory: __DIR__ . "/../../public/uploads/img/",
         );
      }

      // Jika upload file gagal => Kembali ke halaman create user
      if (!$avatar) {
         header("Location: /dashboard/manage-user/create");
         exit();
      }
      
      $isSaveSuccess = $this->userModel->createUser(
         nama: $_POST["nama"],
         username: $_POST["username"],
         password: $_POST["password"],
         auth: $_POST["auth"],
         keterangan: $_POST["keterangan"],
         avatar: $avatar,
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/manage-user/create");
         exit();
      }
      
      header("Location: /dashboard/manage-user");
      exit();
   }
   
   public function delete(int $userId) : void 
   {
      $this->userModel->deleteUser($userId);
      header("Location: /dashboard/manage-user");
      exit();
   }

   public function edit(int $userId) : void 
   {
      $user = $this->userModel->getUserById($userId);

      $avatar = $_FILES["avatar"];

      // Validasi 1 : Jika user menghapus avatar => Gunakan gambar avatar placeholder
      if ($_POST["isAvatarRemoved"] === "true") {
         $avatar = "avatar-placeholder.png";
      }
      // Validasi 2 : Jika user tidak mengganti avatar => Gunakan avatar lama
      else if ($avatar["error"] == UPLOAD_ERR_NO_FILE) {
         $avatar = $user["avatar"];
      }
      // Validasi 3 : Jika user mengganti avatar => Coba pindahkan file avatar baru ke directory local
      else if ($avatar["error"] == UPLOAD_ERR_OK) {
         $avatar = FileHandler::uploadImage(
            file: $avatar,
            targetDirectory: __DIR__ . "/../../public/uploads/img/",
         );
      }

      // Jika upload file gagal => Kembali ke halaman edit user
      if (!$avatar) {
         header("Location: /dashboard/manage-user/edit/$userId");
         exit();
      }

      $isEditSuccess = $this->userModel->editUser(
         id: $userId,
         nama: $_POST["nama"],
         username: $_POST["username"],
         password: $_POST["password"],
         auth: $_POST["auth"],
         keterangan: $_POST["keterangan"],
         avatar: $avatar,
      );

      if (!$isEditSuccess) {
         header("Location: /dashboard/manage-user/edit/$userId");
         exit();
      }

      header("Location: /dashboard/manage-user");
      exit();
   }

   public function activate(int $userId) : void
   {
      $this->userModel->changeUserActiveStatus(id: $userId, status: 1);
      header("Location: /dashboard/manage-user");
      exit();
   }
   
   public function deactivate(int $userId) : void
   {
      $this->userModel->changeUserActiveStatus(id: $userId, status: 0);
      header("Location: /dashboard/manage-user");
      exit();
   }
}