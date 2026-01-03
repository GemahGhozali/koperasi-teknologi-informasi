<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
   </ol>
</nav>

<header class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-end gap-3 mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Layanan Peminjaman</h3>
      <p class="m-0 text-body-secondary">Lihat dan buat pengajuan peminjaman disini</p>
   </div>
   <a href="/dashboard/layanan-koperasi/peminjaman/create" class="btn btn-dark">
      Buat Pengajuan
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- Pengajuan Peminjaman Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Status</th>
            <th>Tanggal Pengajuan</th>
            <th>Besar Pinjaman</th>
            <th>Keperluan</th>
            <th>Jaminan</th>
            <th>Bukti Jaminan</th>
            <th>Lama Peminjaman</th>
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
                  <td><?=CurrencyFormatter::format($application["besar_pinjaman"])?></td>
                  <td><?=$application["keperluan"]?></td>
                  <td><?=$application["jaminan"]?></td>
                  <td><?=$application["bukti_jaminan"]?></td>
                  <td><?=$application["lama_peminjaman"]?> Hari</td>
                  <td><?=$application["keterangan"]?></td>
                  <td><a href=<?="/peminjaman/delete/{$application['id']}"?> class="btn btn-danger">Delete</a></td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>