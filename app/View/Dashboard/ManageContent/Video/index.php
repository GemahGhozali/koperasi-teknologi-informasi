<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content">Manajemen Konten</a></li>
      <li class="breadcrumb-item active" aria-current="page">Video</li>
   </ol>
</nav>

<!-- Header -->
<header class="d-flex justify-content-between align-items-end mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Konten Video</h3>
      <p class="m-0 text-body-secondary">Kelola semua data video disini</p>
   </div>
   <a href="/dashboard/manage-content/video/create" class="btn btn-dark">
      Tambah Video
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- User Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Preview Video</th>
            <th>ID</th>
            <th>Kode Video</th>
            <th>Keterangan</th>
            <th>Created At</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($videos as $video) {?>
            <tr>
               <td>
                  <div class="bg-dark-subtle rounded-3 mx-auto overflow-hidden position-relative group" style="aspect-ratio: 16/8; width: 100px; cursor: pointer;">

                     <!-- Overlay Background (Muncul saat container di hover) -->
                     <div class="video-preview w-100 h-100 position-absolute d-none justify-content-center align-items-center group-hover:d-flex" style="inset: 0; background: rgba(0, 0, 0, .5);"  onclick="showModal('<?=$video['kode_video']?>')">
                        <i class="bi bi-play-fill text-white fs-4"></i>
                     </div>

                     <!-- Preview Video (Thumbnail) -->
                     <img src="https://img.youtube.com/vi/<?=$video['kode_video']?>/hqdefault.jpg" class="w-100 h-100 object-fit-cover">
                  </div>
               </td>
               <td><?=$video["id"]?></td>
               <td><?=$video["kode_video"]?></td>
               <td><?=$video["keterangan"]?></td>
               <td><?=$video["timestamp"]?></td>
               <td>
                  <a href=<?="/dashboard/manage-content/video/edit/{$video['id']}"?> class="btn btn-primary">Edit</a>
                  <a href=<?="/videos/delete/{$video['id']}"?> class="btn btn-danger">Delete</a>

                  <?php if ($video["aktif"] === "1") {?>
                     <a href=<?="/videos/deactivate/{$video['id']}"?> class="btn btn-secondary">Non Active</a>
                  <?php }?>

                  <?php if ($video["aktif"] === "0") {?>
                     <a href=<?="/videos/activate/{$video['id']}"?> class="btn btn-success">Active</a>
                  <?php }?>
               </td>
            </tr>
         <?php } ?>
      </tbody>
   </table>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" style="max-width: 768px;">
      <div class="bg-black modal-content rounded-4 border border-2 border-black overflow-hidden drop-shadow-md" style="aspect-ratio: 16/9;">
         <!-- Iframe YouTube -->
         <iframe id="youtubeIframe" class="w-100 h-100 object-fit-cover"></iframe>
      </div>
   </div>
</div>

<script>
   const youtubeIframe = document.getElementById("youtubeIframe");
   const modal = document.getElementById("modal");
   const bootstrapModal = new bootstrap.Modal(modal);

   // Function untuk memunculkan modal saat preview video di click
   function showModal(videoCode) {
      bootstrapModal.show();
      youtubeIframe.src = `https://www.youtube.com/embed/${videoCode}`;
   }

   // Reset attribure src pada tag iframe saat modal tertutup
   modal.addEventListener("hidden.bs.modal", () => youtubeIframe.src = "");
</script>

