<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>Login</title>

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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

      <!-- BASE STYLE CSS -->
      <link rel="stylesheet" href="/assets/css/base-style.css">

      <!-- CUSTOM UTILITIES CSS -->
      <link rel="stylesheet" href="/assets/css/custom-utilities.css">
   </head>

   <body>
      <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">

         <!-- Register Form -->
         <form id="loginForm" class="w-100 p-5" style="max-width: 560px;" action="/login" method="POST">

            <!-- Logo -->
            <div class="bg-black d-flex justify-content-center align-items-center rounded-circle mb-4 mx-auto" style="width: 48px; height: 48px;">
               <i class="text-white bi bi-bank2 fs-5"></i>
            </div>

            <!-- Heading -->
            <h2 class="mb-2 fw-bold text-center">Selamat Datang di Koperasi Teknologi Informasi!</h2>
            <p class="text-body-secondary mb-5 text-center">Silahkan lakukan registrasi untuk membuat akun</p>

            <!-- Nama Input -->
            <div class="mb-4">
               <label class="mb-2 fw-semibold" for="nama">Nama</label>
               <input id="nama" name="nama" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Nama Disini..." required />
            </div>
            
            <!-- Username Input -->
            <div class="mb-4">
               <label class="mb-2 fw-semibold" for="username">Username</label>
               <input id="username" name="username" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Username Disini..." required />
            </div>
            
            <!-- Password Input -->
            <div class="mb-4">
               <label class="mb-2 fw-semibold" for="password">Password</label>
               <input id="password" name="password" type="password" class="form-control border-dark-subtle" placeholder="Masukkan Password Disini..." required />
            </div>
            
            <!-- Authorization Selects -->
            <div class="mb-4">
               <label class="mb-2 fw-semibold" for="auth">Authorization</label>
               <select id="auth" name="auth" class="form-select mb-4 border-dark-subtle">
                  <option value="tamu">Tamu</option>
                  <option value="anggota">Anggota</option>
                  <option value="pegawai">Pegawai</option>
                  <option value="administrator">Administrator</option>
               </select>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="btn btn-dark w-100 mb-4">Registrasi Akun Anda</button>
            
            <!-- Login Link -->
            <p class="mb-0 text-body-secondary text-center">
               Sudah punya akun? 
               <a href="/login" class="fw-semibold text-black">Login</a>
            </p>

         </form>
         
      </div>
   </body>
</html>