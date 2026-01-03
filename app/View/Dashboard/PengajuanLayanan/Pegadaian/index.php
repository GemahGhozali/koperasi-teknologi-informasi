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

            foreach ($data as $application) { ?>
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
                  <td>
                     <?php if ($application["status"] === "review") { ?>
                        <a href=<?="/pegadaian/approve/{$application['id']}"?> class="btn btn-success">Setuju</a>
                        <a href=<?="/pegadaian/reject/{$application['id']}"?> class="btn btn-danger">Tolak</a>
                     <?php } ?>
                     <?php if ($application["status"] === "disetujui" || $application["status"] === "ditolak") { ?>
                        <a href=<?="/pegadaian/review/{$application['id']}"?> class="btn btn-primary">Review Ulang</a>
                     <?php } ?>
                  </td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>