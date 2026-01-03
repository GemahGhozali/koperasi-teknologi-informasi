<!-- Sidebar -->
<aside id="dashboardSidebar" class="bg-white border-end border-2 border-black vh-100 d-flex flex-column" style="min-width: 280px; transition: 300ms;">

   <!-- Logo -->
   <div class="p-3 border-bottom border-2 position-relative">
      <div class="d-flex align-items-center gap-3">
         <div class="bg-black d-flex flex-grow-0 justify-content-center align-items-center rounded-circle" style="width: 48px; height: 48px;">
            <i class="text-white bi bi-bank2 fs-5"></i>
         </div>
         <div class="text-black">
            <h5 class="fw-bold m-0">Koperasi</h5>
            <p class="m-0">Teknologi Informasi</p>
         </div>
      </div>
      <button id="sidebarCloseButton" type="button" class="position-absolute bg-black text-white d-flex justify-content-center align-items-center rounded-circle border-0 d-block d-lg-none top-50 translate-middle-y" style="width: 28px; height: 28px; right: -14px">
         &#10006;
      </button>
   </div>

   <!-- Dashboard Menu -->
   <div class="d-flex flex-column flex-grow-1 gap-2 p-3 overflow-y-auto">

      <a href="/dashboard" class="dashboard-menu d-flex align-items-center gap-3 text-decoration-none text-black px-3 py-2 rounded-2">
         <i class="bi bi-grid-fill fs-4"></i>
         <p class="m-0">Overview</p>
      </a>
      
      <?php if ($userAuth === "anggota") { ?>
         <a href="/dashboard/layanan-koperasi" class="dashboard-menu d-flex align-items-center gap-3 text-decoration-none text-black px-3 py-2 rounded-2">
            <i class="bi bi-bank2 fs-4"></i>
            <p class="m-0">Layanan Koperasi</p>
         </a>
      <?php } ?>

      <?php if ($userAuth === "administrator") { ?>
         <a href="/dashboard/manage-user" class="dashboard-menu d-flex align-items-center gap-3 text-decoration-none text-black px-3 py-2 rounded-2">
            <i class="bi bi-people-fill fs-4"></i>
            <p class="m-0">Manajemen User</p>
         </a>

         <a href="/dashboard/manage-content" class="dashboard-menu d-flex align-items-center gap-3 text-decoration-none text-black px-3 py-2 rounded-2">
            <i class="bi bi-stack fs-4"></i>
            <p class="m-0">Manajemen Konten</p>
         </a>
      <?php } ?>

      <?php if ($userAuth === "administrator" || $userAuth === "pegawai") { ?>
         <a href="/dashboard/pengajuan-layanan" class="dashboard-menu d-flex align-items-center gap-3 text-decoration-none text-black px-3 py-2 rounded-2">
            <i class="bi bi-file-text-fill fs-4"></i>
            <p class="m-0">Pengajuan Layanan</p>
         </a>
      <?php } ?>

   </div>

   <!-- User Profile -->
   <div class="p-3 border-top border-2 d-flex flex-column gap-3">
      <div class="d-flex align-items-center gap-3" style="cursor: pointer;">
         <div class="flex-grow-0 bg-dark-subtle rounded-circle overflow-hidden" style="width: 42px; height: 42px;">
            <img src=<?=$userAvatar?> alt=<?=$userAvatarName?> class="w-100 h-100 object-fit-cover">
         </div>
         <div>
            <h6 class="m-0 fw-bold"><?=$userNama?></h6>
            <p class="m-0 text-body-secondary text-capitalize"><?=$userAuth?></p>
         </div>
      </div>
      <a href="/" class="btn btn-dark">Kembali Ke Beranda</a>
      <a href="/logout" class="btn btn-outline-dark w-100">Logout</a>
   </div>

</aside>