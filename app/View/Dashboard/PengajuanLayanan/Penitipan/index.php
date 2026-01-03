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
                  <td><?=$application["jenis_barang"]?></td>
                  <td><?=CurrencyFormatter::format($application["modal_barang"])?></td>
                  <td><?=$application["jumlah"]?></td>
                  <td><?=$application["lama_penitipan"]?> Hari</td>
                  <td>
                     <?php if ($application["status"] === "review") { ?>
                        <a href=<?="/penitipan/approve/{$application['id']}"?> class="btn btn-success">Setuju</a>
                        <a href=<?="/penitipan/reject/{$application['id']}"?> class="btn btn-danger">Tolak</a>
                     <?php } ?>
                     <?php if ($application["status"] === "disetujui" || $application["status"] === "ditolak") { ?>
                        <a href=<?="/penitipan/review/{$application['id']}"?> class="btn btn-primary">Review Ulang</a>
                     <?php } ?>
                  </td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>