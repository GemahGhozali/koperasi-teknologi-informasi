<?php

namespace App\Controller;

use App\Core\Controller;
use App\Model\Video;

class ContentVideoController extends Controller {
   private Video $videoModel;

   public function __construct()
   {
      $this->videoModel = new Video();
   }

   public function index() : void
   {
      $videos = $this->videoModel->getAllVideos();
      $data = [
         "page" => "ManageContent/Video/index",
         "videos" => $videos,
      ];

      $this->renderView(view: "Dashboard/index", data: $data);
   }

   public function showCreateVideoPage() : void
   {
      $this->renderView(view: "Dashboard/index", data: ["page" => "ManageContent/Video/create-video"]);
   }

   public function showEditVideoPage(int $videoId) : void
   {
      $video = $this->videoModel->getVideoById($videoId);
      $data = [
         "page" => "ManageContent/Video/edit-video",
         "id" => $video["id"],
         "kodeVideo" => $video["kode_video"],
         "keterangan" => $video["keterangan"],
      ];
      $this->renderView(view: "Dashboard/index", data: $data);
   }

   public function save() : void
   {      
      $isSaveSuccess = $this->videoModel->createVideo(
         kodeVideo: $_POST["kodeVideo"],
         keterangan: $_POST["keterangan"],
      );
      
      if (!$isSaveSuccess) {
         header("Location: /dashboard/manage-content/video/create");
         exit();
      }
      
      header("Location: /dashboard/manage-content/video");
      exit();
   }
   
   public function delete(int $videoId) : void 
   {
      $this->videoModel->deleteVideo($videoId);
      header("Location: /dashboard/manage-content/video");
      exit();
   }

   public function edit(int $videoId) : void 
   {
      $isEditSuccess = $this->videoModel->editVideo(
         id: $videoId,
         kodeVideo: $_POST["kodeVideo"],
         keterangan: $_POST["keterangan"]
      );

      if (!$isEditSuccess) {
         header("Location: /dashboard/manage-content/video/edit/$videoId");
         exit();
      }

      header("Location: /dashboard/manage-content/video");
      exit();
   }

   public function activate(int $videoId) : void
   {
      $this->videoModel->changeVideoActiveStatus(id: $videoId, status: 1);
      header("Location: /dashboard/manage-content/video");
      exit();
   }
   
   public function deactivate(int $videoId) : void
   {
      $this->videoModel->changeVideoActiveStatus(id: $videoId, status: 0);
      header("Location: /dashboard/manage-content/video");
      exit();
   }
}