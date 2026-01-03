<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Beranda</title>

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

      <!-- MAIN CSS -->
      <link rel="stylesheet" href="/assets/css/home.css">
   </head>
   <body>
      <!-- Navbar -->
      <?php require_once __DIR__ . "/../../Templates/navbar.php" ?>

      <!-- Main Content -->
      <main class="container-xxl px-3 px-xxl-0" style="padding-block: 48px;">

         <!-- Hero Section -->
         <section class="row g-0 align-items-center">

            <!-- Left Side (Headline) -->
            <div class="col col-12 col-lg-6 text-center text-lg-start">

               <!-- Headline -->
               <h1 class="fw-bold display-5 mb-4">
                  Wujudkan Masa Depan Finansial Impian Anda Dimulai Dari Sini!
               </h1>
               <p class="m-0 text-body-secondary mb-4">
                  Jadilah bagian dari gerakan yang membuktikan bahwa kekuatan kolektif mampu mengatasi tantangan ekonomi dan meraih kesejahteraan bersama. Bergabunglah dengan lembaga keuangan yang sudah teruji dan terus beradaptasi.
               </p>

               <!-- CTA Button -->
               <div class="d-flex flex-column flex-sm-row justify-content-center justify-content-lg-start gap-3 mb-5">
                  <button class="btn btn-dark">Bergabung Sekarang!</button>
                  <button class="btn btn-outline-dark">Pelajari Selengkapnya</button>
               </div>

               <!-- Mobile Image -->
               <div class="d-flex justify-content-center d-lg-none mb-5">
                  <img src="/assets/img/hero-image.png" alt="hero-image.png" width="90%">
               </div>

               <!-- Clients -->
               <div class="d-flex flex-column flex-lg-row gap-3 align-items-center">

                  <!-- 5 Client Images -->
                  <div class="d-flex"> 
                     <div class="rounded-circle bg-secondary-subtle border border-dark-subtle overflow-hidden" style="width: 50px; height: 50px;">
                        <img src="/assets/img/client-1.webp" alt="client-1.webp" class="w-100 h-100 object-fit-cover">
                     </div> 
                     <div class="rounded-circle bg-secondary-subtle border border-dark-subtle overflow-hidden" style="width: 50px; height: 50px; margin-left: -1rem;">
                        <img src="/assets/img/client-2.webp" alt="client-2.webp" class="w-100 h-100 object-fit-cover">
                     </div> 
                     <div class="rounded-circle bg-secondary-subtle border border-dark-subtle overflow-hidden" style="width: 50px; height: 50px; margin-left: -1rem;">
                        <img src="/assets/img/client-3.webp" alt="client-3.webp" class="w-100 h-100 object-fit-cover">
                     </div> 
                     <div class="rounded-circle bg-secondary-subtle border border-dark-subtle overflow-hidden" style="width: 50px; height: 50px; margin-left: -1rem;">
                        <img src="/assets/img/client-4.webp" alt="client-4.webp" class="w-100 h-100 object-fit-cover">
                     </div> 
                     <div class="rounded-circle bg-secondary-subtle border border-dark-subtle overflow-hidden" style="width: 50px; height: 50px; margin-left: -1rem;">
                        <img src="/assets/img/client-5.webp" alt="client-5.webp" class="w-100 h-100 object-fit-cover">
                     </div>

                  </div>

                  <!-- Total Client -->
                  <p class="m-0 text-body-secondary text-center text-lg-start">
                     Telah dipercaya oleh <br> <strong>10.000+</strong> anggota seluruh Indonesia!
                  </p>

               </div>
               
            </div>

            <!-- Right Side (Hero Image) -->
            <div class="col col-12 col-lg-6 justify-content-center d-none d-lg-flex">
               <img src="/assets/img/hero-image.png" alt="hero-image.png" width="85%">
            </div>

         </section>
         
      </main>

      <!-- Footer -->
      <?php require_once __DIR__ . "/../../Templates/footer.php" ?>
   </body>
</html>