<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi/penitipan">Penitipan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Buat Pengajuan</li>
   </ol>
</nav>

<!-- Penitipan Form -->
<form method="POST" action="/penitipan/create" enctype="multipart/form-data">

   <!-- Tanggal Pengajuan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="tanggal">Tanggal Pengajuan</label>
      <input id="tanggal" name="tanggal" type="date" class="form-control border-dark-subtle" required />
   </div>

   <!-- Jenis Barang Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="jenisBarang">Jenis Barang</label>
      <input id="jenisBarang" name="jenisBarang" type="text" class="form-control border-dark-subtle" placeholder="Masukkan Jenis Barang Disini..." required />
   </div>

   <!-- Modal Barang Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="modalBarang">Modal Barang</label>
      <input id="modalBarang" name="modalBarang" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Modal Barang Disini..." required />
   </div>   

   <!-- Jumlah Barang Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="jumlah">Jumlah Barang</label>
      <input id="jumlah" name="jumlah" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Jumlah Barang Disini..." required />
   </div>

   <!-- Lama Penitipan Input -->
   <div class="mb-4">
      <label class="mb-2 fw-semibold" for="lamaPenitipan">Lama Penitipan (Hari)</label>
      <input id="lamaPenitipan" name="lamaPenitipan" type="number" class="form-control border-dark-subtle" placeholder="Masukkan Lama Penitipan Disini..." required />
   </div>
   
   <!-- Submit and Reset Button -->
   <div class="d-flex justify-content-end gap-3">
      <button type="reset" class="btn btn-outline-dark">
         Batal
      </button>
      <button name="user" type="submit" class="btn btn-dark">
         Ajukan Penitipan
      </button>
   </div>

</form>