<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/layanan-koperasi">Layanan Koperasi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Penitipan</li>
   </ol>
</nav>

<header class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-end gap-3 mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Layanan Penitipan Barang</h3>
      <p class="m-0 text-body-secondary">Lihat dan buat pengajuan penitipan barang disini</p>
   </div>
   <a href="/dashboard/layanan-koperasi/penitipan/create" class="btn btn-dark">
      Buat Pengajuan
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- Pengajuan Penitipan Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Status</th>
            <th>Tanggal Pengajuan</th>
            <th>Jenis Barang</th>
            <th>Modal Barang</th>
            <th>Jumlah</th>
            <th>Lama Penitipan</th>
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
                  <td><?=$application["jenis_barang"]?></td>
                  <td><?=CurrencyFormatter::format($application["modal_barang"])?></td>
                  <td><?=$application["jumlah"]?></td>
                  <td><?=$application["lama_penitipan"]?> Hari</td>
                  <td><a href=<?="/penitipan/delete/{$application['id']}"?> class="btn btn-danger">Delete</a></td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>