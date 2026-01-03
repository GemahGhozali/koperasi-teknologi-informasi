<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pegadaian</li>
   </ol>
</nav>

<header class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-end gap-3 mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Layanan Pegadaian</h3>
      <p class="m-0 text-body-secondary">Lihat dan buat pengajuan pegadaian disini</p>
   </div>
   <a href="/dashboard/layanan-koperasi/pegadaian/create" class="btn btn-dark">
      Buat Pengajuan
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- Pengajuan Pegadaian Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Status</th>
            <th>Tanggal Pengajuan</th>
            <th>Jenis Barang</th>
            <th>Informasi Barang</th>
            <th>Nilai Barang</th>
            <th>Nama Dokumen</th>
            <th>Keterangan</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
            use App\Utils\CurrencyFormatter;

            foreach ($applications as $application) { ?>
               <tr>
                  <td class="text-center">
                     <?php if ($application["status"] === "review") { ?>
                        <span class="badge text-bg-primary rounded-5">Review</span>
                     <?php } ?>
                     <?php if ($application["status"] === "disetujui") { ?>
                        <span class="badge text-bg-success rounded-5">Disetujui</span>
                     <?php } ?>
                     <?php if ($application["status"] === "ditolak") { ?>
                        <span class="badge text-bg-danger rounded-5">Ditolak</span>
                     <?php } ?>
                  </td>
                  <td><?=$application["tanggal"]?></td>
                  <td><?=$application["jenis"]?></td>
                  <td><?=$application["informasi"]?></td>
                  <td><?=CurrencyFormatter::format($application["nilai"])?></td>
                  <td><?=$application["dokumen"]?></td>
                  <td><?=$application["keterangan"]?></td>
                  <td><a href=<?="/pegadaian/delete/{$application['id']}"?> class="btn btn-danger">Delete</a></td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>

<!-- <div class="bg-white border border-2 border-black rounded-4 p-3 drop-shadow-md">
   <h5 class="fw-bold mb-1 text-black">Kendaraan</h5>
   <p class="mb-3 text-body-secondary">Rp 500.000.000</p>

   <div class="d-flex gap-4">
      
      <div class="d-flex align-items-center gap-2">
         <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center" style="width: 36px; height: 36px;">
            <i class="bi bi-calendar-week-fill text-white" style="font-size: 14px; margin-top: 1px;"></i>
         </div>
         <div>
            <p class="fw-bold mb-0" style="font-size: 14px;">Tanggal</p>
            <p class="text-body-secondary mb-0">2025-11-2024</p>
         </div>
      </div>
      
      <div class="d-flex align-items-center gap-2">
         <div class="bg-dark rounded-circle d-flex justify-content-center align-items-center" style="width: 36px; height: 36px;">
            <i class="bi bi-hourglass-split text-white" style="font-size: 14px; margin-top: 1px;"></i>
         </div>
         <div>
            <p class="fw-bold mb-0" style="font-size: 14px;">Status</p>
            <p class="text-body-secondary mb-0">Pending</p>
         </div>
      </div>

   </div>

   <hr>

   <div class="d-flex gap-3">
      <button class="btn btn-dark w-100">Lihat Detail</button>
      <button class="btn btn-danger w-100">Hapus Pengajuan</button>
   </div>

</div> -->