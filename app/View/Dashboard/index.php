<?php

use App\Model\User;

$userModel = new User();
$user = $userModel->getUserById($_SESSION["userId"]);

$userAvatar = "/uploads/img/" . $user["avatar"];
$userAvatarName = $user["avatar"];
$userNama = $user["nama"];
$userAuth = $user["auth"];

?>

<!DOCTYPE html>
<html lang="id">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Dashboard</title>

   <!-- FAVICON -->
   <link rel="icon" type="image/x-icon" href="/assets/svg/logo.svg">

   <!-- GOOGLE FONT (SPACE GROTESK)  -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet" />

   <!-- BOOTSTRAP -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   
   <!-- BOOTSTRAP ICON -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
   
   <!-- BASE STYLE CSS -->
   <link rel="stylesheet" href="/assets/css/base-style.css">

   <!-- CUSTOM UTILITIES CSS -->
   <link rel="stylesheet" href="/assets/css/custom-utilities.css">
   
   <!-- MAIN CSS FILE -->
   <link rel="stylesheet" href="/assets/css/dashboard.css">
</head>
<body>
   <div class="d-flex flex-column flex-lg-row overflow-hidden min-vh-100">
      <div class="p-3 p-sm-4 p-lg-0 bg-light">
         <button id="sidebarToggler" type="button" class="p-0 bg-transparent border-0 fs-2 d-lg-none">
            <i class="bi bi-list"></i>
         </button>

         <!-- Sidebar -->
         <?php require_once __DIR__ . "/../../Templates/sidebar.php" ?>
      </div>

      <!-- Konten Utama -->
      <main class="flex-grow-1 overflow-auto p-3 p-sm-4 bg-light vh-100">
         <?php
            $pageFile = "Overview/index";

            if (isset($page)) {
               $pageFile = $page;
            }

            require_once __DIR__ . "/../Dashboard/" . $pageFile . ".php";
         ?>
      </main>
   </div>

   <script>
      // Tambah active class ke dashboard menu berdasarkan path saat ini
      const dashboardMenus = document.querySelectorAll(".dashboard-menu");
      const currentPath = window.location.pathname;
      
      dashboardMenus.forEach((menu) => {
         const menuPath = menu.getAttribute("href");

         // Kondisi 1 : URL path saat ini sama dengan menuPath
         // Kondisi 2 : URL path diatas tidak memiliki value href = "/dashboard"
         // Kondisi 3 : URL path diatas itu diawali dengan karakter "/dashboard/manage-user/" {create, edit}
         const isMenuActive = currentPath === menuPath || (menuPath !== '/dashboard' && currentPath.startsWith(menuPath + '/'));

         if (isMenuActive) {
            menu.classList.add("active");
         }
      });
      
      // Logika sidebar di breakpoint mobile
      const dashboardSidebar = document.getElementById("dashboardSidebar");
      const sidebarToggler = document.getElementById("sidebarToggler");
      const sidebarCloseButton = document.getElementById("sidebarCloseButton");
      
      // Tambah active class ke sidebar saat klik sidebarToggler
      sidebarToggler.addEventListener("click", () => {
         dashboardSidebar.classList.add("active");
      });
      
      // Hapus active class ke sidebar saat klik sidebarCloseButton
      sidebarCloseButton.addEventListener("click", () => {
         dashboardSidebar.classList.remove("active");
      });
   </script>
</body>
</html>