<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi/peminjaman">Peminjaman</a></li>
      <li class="breadcrumb-item active" aria-current="page">Buat Pengajuan</li>
   </ol>
</nav>

<!-- Peminjaman Form -->
<form method="POST" action="/peminjaman/create" enctype="multipart/form-data">

   <!-- Tanggal Pengajuan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="tanggal">Tanggal Pengajuan</label>
      <input id="tanggal" name="tanggal" type="date" class="form-control border-dark-subtle" required />
   </div>

   <!-- Besar Pinjaman Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="besarPinjaman">Besar Pinjaman</label>
      <input id="besarPinjaman" name="besarPinjaman" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Besar Pinjaman Disini..." required />
   </div>

   <!-- Keperluan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="keperluan">Keperluan</label>
      <input id="keperluan" name="keperluan" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Keperluan Disini..." required />
   </div>

   <!-- Jaminan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="jaminan">Jaminan</label>
      <input id="jaminan" name="jaminan" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Jaminan Disini..." required />
   </div>

   <!-- Bukti Jaminan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="buktiJaminan">Bukti Jaminan</label>
      <input id="buktiJaminan" name="buktiJaminan" type="file" class="form-control border-dark-subtle" required />
   </div>

   <!-- Lama Peminjaman Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="lamaPeminjaman">Lama Peminjaman (Hari)</label>
      <input id="lamaPeminjaman" name="lamaPeminjaman" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Lama Peminjaman Disini..." required />
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
         Ajukan Peminjaman
      </button>
   </div>

</form>