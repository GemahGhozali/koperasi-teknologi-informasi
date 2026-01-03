<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi/pegadaian">Pegadaian</a></li>
      <li class="breadcrumb-item active" aria-current="page">Buat Pengajuan</li>
   </ol>
</nav>

<!-- Pegadaian Form -->
<form method="POST" action="/pegadaian/create" enctype="multipart/form-data">

   <!-- Tanggal Pengajuan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="tanggal">Tanggal Pengajuan</label>
      <input id="tanggal" name="tanggal" type="date" class="form-control border-dark-subtle" required />
   </div>

   <!-- Jenis Barang Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="jenis">Jenis Barang</label>
      <input id="jenis" name="jenis" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Jenis Barang Disini..." required />
   </div>

   <!-- Informasi Barang Textarea -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="informasi">Informasi Barang</label>
      <textarea name="informasi" id="informasi" class="form-control border-dark-subtle" placeholder="Masukkan Informasi Barang Disini..." required rows="5"></textarea>
   </div>
   
   <!-- Nilai Barang Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="nilai">Nilai Barang</label>
      <input id="nilai" name="nilai" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Nilai Barang Disini..." required />
   </div>
   
   <!-- Dokumen Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="dokumen">Dokumen</label>
      <input id="dokumen" name="dokumen" type="file" class="form-control border-dark-subtle" required />
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
      <button name="user" type="submit" class="btn btn-dark">
         Ajukan Pegadaian
      </button>
   </div>

</form>