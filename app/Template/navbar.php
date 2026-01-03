<!-- Navbar -->
<nav class="navbar navbar-expand-lg sticky-top p-0 px-sm-3 pt-sm-3">
   <div class="container-xxl p-0 bg-white border border-2 border-black p-3 drop-shadow-md" style="border-radius: 50px;">

      <!-- Logo -->
      <div class="d-flex align-items-center gap-3">
         <div class="bg-black d-flex flex-grow-0 justify-content-center align-items-center rounded-circle" style="width: 48px; height: 48px;">
            <i class="text-white bi bi-bank2 fs-5"></i>
         </div>
         <div class="text-black">
            <h5 class="fw-bold m-0">Koperasi</h5>
            <p class="m-0">Teknologi Informasi</p>
         </div>
      </div>

      <!-- Navbar Toggler -->
      <button class="navbar-toggler p-0 border-0 bg-transparent shadow-none p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
         <i class="bi bi-list fs-2"></i>
      </button>

      <!-- Offcanvas Sidebar -->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
         <div class="offcanvas-body d-flex flex-column flex-lg-row p-0">

            <!-- Navbar Links -->
            <div class="order-2 order-lg-0 navbar-nav justify-content-center align-items-lg-center flex-lg-grow-1 gap-2 gap-xl-3 p-4 p-lg-0">
               <a class="nav-link active" aria-current="page" href="#">Beranda</a>
               <a class="nav-link" href="#">Tentang Kami</a>
               <a class="nav-link" href="#">Galeri</a>
               <a class="nav-link" href="#">Artikel</a>
               <?php if ($isAuthenticated === true && $auth !== "tamu") { ?>
                  <a class="nav-link" href="/dashboard">Dashboard</a>
               <?php } ?>
            </div>

            <hr class="m-0 order-1 d-lg-none">
            
            <div class="order-0 order-lg-1 d-flex gap-3 align-items-center p-4 p-lg-0">

               <!-- Jika user sudah terautentikasi => Tampilkan profile user -->
               <?php if ($isAuthenticated === true) { ?>
                  <div class="order-1 order-lg-0 text-start text-lg-end ">
                     <h6 class="m-0 fw-bold"><?=$nama?></h6>
                     <p class="m-0 text-body-secondary text-capitalize"><?=$auth?></p>
                  </div>
                  <img src=<?=$avatar?> alt=<?=$avatarName?> class="order-0 order-lg-1 flex-grow-0 bg-dark-subtle rounded-circle object-fit-cover" style="width: 50px; height: 50px; cursor: pointer;">
               <?php } ?>

               <!-- Jika user belum terautentikasi => Tampilkan logo -->
               <?php if ($isAuthenticated === false) { ?>
                  <div class="d-flex d-lg-none align-items-center gap-3">
                     <div class="bg-black d-flex flex-grow-0 justify-content-center align-items-center rounded-circle" style="width: 48px; height: 48px;">
                        <i class="text-white bi bi-bank2 fs-5"></i>
                     </div>
                     <div class="text-black">
                        <h5 class="fw-bold m-0">Koperasi</h5>
                        <p class="m-0">Teknologi Informasi</p>
                     </div>
                  </div>
               <?php } ?>
               
               <!-- Close Button -->
               <button type="button" class="btn-close order-2 ms-auto d-lg-none shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <!-- Jika user belum terautentikasi => Tampilkan button register dan login -->
            <?php if ($isAuthenticated === false) { ?>
               <div id="ctaButtons" class="order-3 d-flex flex-column flex-lg-row align-items-center gap-3 gap-lg-2 px-4 p-lg-0">
                  <a href="/register" class="order-1 order-lg-0 btn btn-outline-dark rounded-5 px-3 py-2 d-block">Register</a>
                  <a href="/login" class="btn btn-dark rounded-5 px-3 py-2 d-block">Login</a>
               </div>
            <?php } ?>
         </div>
      </div>
   </div>
</nav>