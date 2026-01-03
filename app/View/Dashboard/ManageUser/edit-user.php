<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-user">Manajemen User</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit User</li>
   </ol>
</nav>

<!-- Edit User Form -->
<form method="POST" action=<?="/users/edit/$id"?> enctype="multipart/form-data">

   <!-- Avatar Inpur -->
   <div class="d-flex align-items-center gap-3 mb-4">

      <!-- Image Preview -->
      <img id="imagePreview" src=<?=$avatar?> alt=<?=$avatarName?> class="rounded-circle object-fit-cover" style="width: 100px; height: 100px;">
      <div>
         <!-- Heading -->
         <h6 class="mb-1 d-block">Avatar</h6>
         <p class="mb-2 text-body-secondary" style="font-size: 14px;">
            JPEG, JPG, PNG and WEBP, up to 1MB
         </p>
   
         <!-- Hidden input (Informasi tambahan apakah user menghapus avatar atau tidak) -->
         <input type="hidden" name="isAvatarRemoved" id="isAvatarRemoved" value="false">
         
         <!-- File Input (Hidden) -->
         <input type="file" id="avatarInput" class="d-none" name="avatar">

         <!-- File Input Label -->
         <label class="btn btn-dark me-2" for="avatarInput">Change</label>

         <!-- Remove Avatar Button -->
         <button type="button" id="removeAvatarButton" class="btn btn-outline-dark">Remove</button>
      </div>

   </div>

   <!-- Nama Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="nama">Nama</label>
      <input id="nama" name="nama" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Nama Disini..." required value="<?=$nama?>" />
   </div>
   
   <!-- Username Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="username">Username</label>
      <input id="username" name="username" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Username Disini..." required value="<?=$username?>" />
   </div>
   
   <!-- Password Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="password">Password</label>
      <input id="password" name="password" type="password" class="form-control border-dark-subtle" placeholder="Masukkan Password Disini..." required value="<?=$password?>" />
   </div>
   
   <!-- Authorization Selects -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="auth">Authorization</label>
      <select id="auth" name="auth" class="form-select mb-4 border-dark-subtle" value="<?=$auth?>">
         <option value="tamu">Tamu</option>
         <option value="anggota">Anggota</option>
         <option value="pegawai">Pegawai</option>
         <option value="administrator">Administrator</option>
      </select>
   </div>
   
   <!-- Keterangan Textarea -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="keterangan">Keterangan</label>
      <textarea name="keterangan" id="keterangan" class="form-control border-dark-subtle" placeholder="Masukkan Keterangan Disini..." required rows="5"><?=$keterangan?></textarea>
   </div>

   <!-- Submit Button -->
   <div class="d-flex justify-content-end gap-3">
      <button name="user" type="submit" class="btn btn-dark">
         Lakukan Perubahan
      </button>
   </div>

</form>

<script>
   const authValue = "<?= $auth ?>";
   const authOptions = document.querySelectorAll("option");

   // Memberikan attribute selected pada tag option yang memiliki kesamaan value dengan authValue
   authOptions.forEach((option) => {
      if (option.value === authValue) {
         option.setAttribute("selected", "selected");
      }
   });

   const imagePreview = document.getElementById("imagePreview");
   const avatarInput = document.getElementById("avatarInput");
   const avatarInputLabel = document.querySelector("label[for='avatarInput']");
   const removeAvatarButton = document.getElementById("removeAvatarButton");
   const isAvatarRemoved = document.getElementById("isAvatarRemoved");

   const imageFileName = "<?=$avatarName?>";

   if (imageFileName === "avatar-placeholder.png") {
      avatarInputLabel.textContent = "Upload";
      removeAvatarButton.classList.add("d-none");
   }

   // Logic menampilkan preview gambar saat user mengganti avatar
   avatarInput.addEventListener("change", () => {
      imagePreview.src = URL.createObjectURL(avatarInput.files[0]);
      removeAvatarButton.classList.remove("d-none");
      isAvatarRemoved.value = "false";
      avatarInputLabel.textContent = "Change";
   });
   
   // Logic hapus avatar saat user click tombol remove
   removeAvatarButton.addEventListener("click", () => {
      imagePreview.src = "/assets/img/avatar-placeholder.png";
      avatarInput.value = "";
      removeAvatarButton.classList.add("d-none");
      isAvatarRemoved.value = "true";
      avatarInputLabel.textContent = "Upload";
   });
</script>