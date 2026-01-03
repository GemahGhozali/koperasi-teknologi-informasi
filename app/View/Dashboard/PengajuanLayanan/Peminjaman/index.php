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
                  <td><?=CurrencyFormatter::format($application["besar_pinjaman"])?></td>
                  <td><?=$application["keperluan"]?></td>
                  <td><?=$application["jaminan"]?></td>
                  <td><?=$application["bukti_jaminan"]?></td>
                  <td><?=$application["lama_peminjaman"]?> Hari</td>
                  <td><?=$application["keterangan"]?></td>
                  <td>
                     <?php if ($application["status"] === "review") { ?>
                        <a href=<?="/peminjaman/approve/{$application['id']}"?> class="btn btn-success">Setuju</a>
                        <a href=<?="/peminjaman/reject/{$application['id']}"?> class="btn btn-danger">Tolak</a>
                     <?php } ?>
                     <?php if ($application["status"] === "disetujui" || $application["status"] === "ditolak") { ?>
                        <a href=<?="/peminjaman/review/{$application['id']}"?> class="btn btn-primary">Review Ulang</a>
                     <?php } ?>
                  </td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>