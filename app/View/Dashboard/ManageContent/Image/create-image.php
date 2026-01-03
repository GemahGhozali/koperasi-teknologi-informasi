<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content">Manajemen Konten</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content/image">Gambar</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Gambar</li>
   </ol>
</nav>

<!-- Create Image Form -->
<form method="POST" action="/images/create" enctype="multipart/form-data">

   <!-- Image Input -->
   <div class="d-flex align-items-end gap-3 mb-4">

      <!-- Image Preview -->
      <img id="imagePreview" src="/assets/img/image-placeholder.png" alt="image-preview" class="rounded-3 object-fit-cover" style="aspect-ratio: 16/9; height: 120px;">
      <div>
         <!-- Heading -->
         <h6 class="mb-1 fw-bold d-block">Gambar</h6>
         <p class="mb-2 text-body-secondary" style="font-size: 14px;">
            JPEG, JPG, PNG and WEBP, up to 1MB
         </p>

         <!-- File Input (Hidden) -->
         <input type="file" id="imageInput" class="d-none" name="image">

         <!-- File Input Label -->
         <label class="btn btn-dark me-2" for="imageInput">Upload</label>
      </div>
   </div>

   <!-- Keterangan Textarea -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="keterangan">Keterangan</label>
      <textarea name="keterangan" id="keterangan" class="form-control border-dark-subtle" placeholder="Masukkan Keterangan Disini..." required rows="5"></textarea>
   </div>

   <!-- Submit and Reset Button -->
   <div class="d-flex justify-content-end gap-3">
      <button type="reset" class="btn btn-outline-dark">
         Batal
      </button>
      <button name="image" type="submit" class="btn btn-dark">
         Tambah Gambar
      </button>
   </div>

</form>

<script>
   const imagePreview = document.getElementById("imagePreview");
   const imageInput = document.getElementById("imageInput");
   const imageInputLabel = document.querySelector("label[for='imageInput']");

   // Logic menampilkan preview gambar saat user upload file
   imageInput.addEventListener("change", () => {
      imagePreview.src = URL.createObjectURL(imageInput.files[0]);
      imageInputLabel.textContent = "Change";
   });
</script>