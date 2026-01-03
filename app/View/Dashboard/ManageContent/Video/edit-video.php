<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content">Manajemen Konten</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content/video">Video</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Video</li>
   </ol>
</nav>

<!-- Edit Video Form -->
<form method="POST" action=<?="/videos/edit/$id"?>>

   <!-- Kode Video Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="kodeVideo">Kode Video</label>
      <input id="kodeVideo" name="kodeVideo" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Kode Video Disini..." required value="<?=$kodeVideo?>" />
   </div>

   <!-- Keterangan Textarea -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="keterangan">Keterangan</label>
      <textarea name="keterangan" id="keterangan" class="form-control border-dark-subtle" placeholder="Masukkan Keterangan Disini..." required rows="5"><?=$keterangan?></textarea>
   </div>

   <!-- Submit Button -->
   <div class="d-flex justify-content-end gap-3">
      <button name="video" type="submit" class="btn btn-dark">
         Lakukan Perubahan
      </button>
   </div>
   
</form>