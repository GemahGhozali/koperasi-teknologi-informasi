<?php

namespace App\Utils;

class FileHandler {
   public static function uploadImage(array $file, string $targetDirectory, int $maxSize = 1000000) : ?string
   {
      $allowedTypes = ["jpg", "jpeg", "png", "webp"];
      $fileName = basename($file["name"]);
      $tempFile = $file["tmp_name"];
      $fileSize = $file["size"];
      $targetFile = $targetDirectory . $fileName;
      $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      // Validasi 1 : Mengecek apakah file merupakan gambar atau bukan
      $check = getimagesize($file["tmp_name"]);
      if ($check === false) return null;

      // Validasi 2 : Mengecek apakah ukuran file lebih dari batas maksimal atau tidak
      if ($fileSize > $maxSize) return null;
      
      // Validasi 3 : Mengecek apakah extension file sesuai dengan yang ditentukan
      if (!in_array($fileExtension, $allowedTypes)) return null;
      
      // Validasi 4 : Mengecek apakah file sudah ada atau belum
      if (file_exists($targetFile)) return $fileName;

      // Validasi 5 : Mengecek apakah file berhasil dipindahkan
      $isUploadSuccess = move_uploaded_file($tempFile, $targetFile);
      if (!$isUploadSuccess) return null;

      return $fileName;
   }

   public static function uploadPdf(array $file, string $targetDirectory, int $maxSize = 5000000) : ?string
   {
      $allowedTypes = ["pdf"];
      $fileName = basename($file["name"]);
      $tempFile = $file["tmp_name"];
      $fileSize = $file["size"];
      $targetFile = $targetDirectory . $fileName;
      $fileExtension = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

      // Validasi 1 : Mengecek apakah file merupakan PDF atau bukan
      $fileMimeType = mime_content_type($tempFile);
      if ($fileMimeType !== 'application/pdf') return null;

      // Validasi 2 : Mengecek apakah ukuran file lebih dari batas maksimal atau tidak
      if ($fileSize > $maxSize) return null;
      
      // Validasi 3 : Mengecek apakah extension file sesuai dengan yang ditentukan
      if (!in_array($fileExtension, $allowedTypes)) return null;
      
      // Validasi 4 : Mengecek apakah file sudah ada atau belum
      if (file_exists($targetFile)) return $fileName;

      // Validasi 5 : Mengecek apakah file berhasil dipindahkan
      $isUploadSuccess = move_uploaded_file($tempFile, $targetFile);
      if (!$isUploadSuccess) return null;

      return $fileName;
   }
}