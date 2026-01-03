<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content">Manajemen Konten</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content/image">Gambar</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Gambar</li>
   </ol>
</nav>

<!-- Edit Image Form -->
<form method="POST" action=<?="/images/edit/$id"?> enctype="multipart/form-data">

   <!-- Image Input -->
   <div class="d-flex align-items-end gap-3 mb-4">

      <!-- Image Preview -->
      <img id="imagePreview" src=<?=$imagePath?> alt="image-preview" class="rounded-3 object-fit-cover" style="aspect-ratio: 16/9; height: 120px;">
      <div>
         <!-- Heading -->
         <h6 class="mb-1 fw-bold d-block">Gambar</h6>
         <p class="mb-2 text-body-secondary" style="font-size: 14px;">
            JPEG, JPG, PNG and WEBP, up to 1MB
         </p>

         <!-- File Input (Hidden) -->
         <input type="file" id="imageInput" class="d-none" name="image"> 

         <!-- File Input Label -->
         <label class="btn btn-dark me-2" for="imageInput">Change</label>

         <!-- Reset Button (Kembali ke avatar sebelumnya) -->
         <button type="button" id="resetImageButton" class="btn btn-outline-dark d-none">Reset</button>
      </div>
   </div>

   <!-- Keterangan Textarea -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="keterangan">Keterangan</label>
      <textarea name="keterangan" id="keterangan" class="form-control border-dark-subtle" placeholder="Masukkan Keterangan Disini..." required rows="5"><?=$keterangan?></textarea>
   </div>

   <!-- Submit Button -->
   <div class="d-flex justify-content-end gap-3">
      <button name="image" type="submit" class="btn btn-dark">
         Lakukan Perubahan
      </button>
   </div>

</form>

<script>
   const imagePreview = document.getElementById("imagePreview");
   const imageInput = document.getElementById("imageInput");
   const resetImageButton = document.getElementById("resetImageButton");

   // Logic menampilkan preview gambar saat user mengganti gambar
   imageInput.addEventListener("change", () => {
      imagePreview.src = URL.createObjectURL(imageInput.files[0]);
      resetImageButton.classList.remove("d-none");
   });

   // Logic kembali ke avatar sebelumnya saat user click tombol reset
   resetImageButton.addEventListener("click", () => {
      imagePreview.src = "<?=$imagePath?>";
      imageInput.value = "";
      resetImageButton.classList.add("d-none");
   });
</script>