<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Image;
use App\Utils\FileHandler;

class ContentImageController extends Controller {
   private Image $imageModel;

   public function __construct()
   {
      $this->imageModel = new Image();
   }

   public function index() : void
   {
      $images = $this->imageModel->getAllImages();
      $data = [
         "page" => "ManageContent/Image/index",
         "images" => $images,
      ];

      $this->renderView(view: "Dashboard/index", data: $data);
   }

   public function showCreateImagePage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "ManageContent/Image/create-image"]);
   }

   public function showEditImagePage(int $imageId) : void
   {
      $image = $this->imageModel->getImageById($imageId);
      $data = [
         "page" => "ManageContent/Image/edit-image",
         "id" => $image["id"],
         "imagePath" => "/uploads/img/" . $image["nama_file"],
         "keterangan" => $image["keterangan"],
      ];

      $this->renderView(view: "Dashboard/index", data: $data);
   }

   public function save() : void
   {
      $image = $_FILES["image"];

      // Validasi 1 : Jika user tidak mengupload file apapun => Set nama file ke null (untuk trigger error)
      if ($image["error"] == UPLOAD_ERR_NO_FILE) {
         $image = null;
      }
      // Validasi 2 : Jika user mengupload file => Coba pindahkan file gambar ke directory local
      else if ($image["error"] == UPLOAD_ERR_OK) {
         $image = FileHandler::uploadImage(
            file: $image,
            targetDirectory: __DIR__ . "/../../public/uploads/img/",
         );
      }

      // Jika upload file gagal / file gambar null => Kembali ke halaman create image
      if (!$image) {
         header("Location: /dashboard/manage-content/image/create");
         exit();
      }
      
      $isSaveSuccess = $this->imageModel->createImage(
         namaFile: $image,
         keterangan: $_POST["keterangan"],
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/manage-content/image/create");
         exit();
      }
      
      header("Location: /dashboard/manage-content/image");
      exit();
   }
   
   public function delete(int $imageId) : void 
   {
      $this->imageModel->deleteImage($imageId);
      header("Location: /dashboard/manage-content/image");
      exit();
   }

   public function edit(int $imageId) : void 
   {
      $oldImage = $this->imageModel->getImageById($imageId);

      $image = $_FILES["image"];

      // Validasi 1 : Jika user tidak mengganti gambar => Gunakan gambar lama
      if ($image["error"] == UPLOAD_ERR_NO_FILE) {
         $image = $oldImage["nama_file"];
      }
      // Validasi 2 : Jika user mengganti gambar => Coba pindahkan file gambar baru ke directory local
      else if ($image["error"] == UPLOAD_ERR_OK) {
         $image = FileHandler::uploadImage(
            file: $image,
            targetDirectory: __DIR__ . "/../../public/uploads/img/",
         );
      }

      // Jika upload file gagal => Kembali ke halaman edit image
      if (!$image) {
         header("Location: /dashboard/manage-content/image/edit/$imageId");
         exit();
      }

      $isEditSuccess = $this->imageModel->editImage(
         id: $imageId, 
         namaFile: $image, 
         keterangan: $_POST["keterangan"]
      );

      if (!$isEditSuccess) {
         header("Location: /dashboard/manage-content/image/edit/$imageId");
         exit();
      }

      header("Location: /dashboard/manage-content/image");
      exit();
   }

   public function activate(int $imageId) : void
   {
      $this->imageModel->changeImageActiveStatus(id: $imageId, status: 1);
      header("Location: /dashboard/manage-content/image");
      exit();
   }
   
   public function deactivate(int $imageId) : void
   {
      $this->imageModel->changeImageActiveStatus(id: $imageId, status: 0);
      header("Location: /dashboard/manage-content/image");
      exit();
   }
}