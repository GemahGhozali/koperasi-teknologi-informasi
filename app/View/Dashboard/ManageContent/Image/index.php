<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/dashboard/manage-content">Manajemen Konten</a></li>
      <li class="breadcrumb-item active" aria-current="page">Gambar</li>
   </ol>
</nav>

<!-- Header -->
<header class="d-flex justify-content-between align-items-end mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Konten Gambar</h3>
      <p class="m-0 text-body-secondary">Kelola semua data gambar disini</p>
   </div>
   <a href="/dashboard/manage-content/image/create" class="btn btn-dark">
      Tambah Gambar
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- User Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Preview Gambar</th>
            <th>ID</th>
            <th>Nama File</th>
            <th>Keterangan</th>
            <th>Created At</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach($images as $image) {?>
            <tr>
               <td>
                  <div class="bg-dark-subtle rounded-3 mx-auto overflow-hidden position-relative group" style="aspect-ratio: 16/9; width: 100px; cursor: pointer;">

                     <!-- Overlay Background (Muncul saat container di hover) -->
                     <div class="image-preview w-100 h-100 position-absolute d-none justify-content-center align-items-center group-hover:d-flex" style="inset: 0; background: rgba(0, 0, 0, .5);" onclick="showModal('<?=$image['nama_file']?>')">
                        <i class="bi bi-image-fill text-white fs-4"></i>
                     </div>

                     <!-- Preview Image -->
                     <img src=<?="/uploads/img/{$image['nama_file']}"?> class="image-preview w-100 h-100 object-fit-cover">

                  </div>
               </td>
               <td><?=$image["id"]?></td>
               <td><?=$image["nama_file"]?></td>
               <td><?=$image["keterangan"]?></td>
               <td><?=$image["timestamp"]?></td>
               <td>
                  <a href=<?="/dashboard/manage-content/image/edit/{$image['id']}"?> class="btn btn-primary">Edit</a>
                  <a href=<?="/images/delete/{$image['id']}"?> class="btn btn-danger">Delete</a>

                  <?php if ($image["aktif"] === "1") {?>
                     <a href=<?="/images/deactivate/{$image['id']}"?> class="btn btn-secondary">Non Active</a>
                  <?php }?>

                  <?php if ($image["aktif"] === "0") {?>
                     <a href=<?="/images/activate/{$image['id']}"?> class="btn btn-success">Active</a>
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
         <!-- Image -->
         <img id="modalImage" src="" class="w-100 h-100 object-fit-cover">
      </div>
   </div>
</div>

<script>
   const imagePreviews = document.querySelectorAll(".image-preview");
   const bootstrapModal = new bootstrap.Modal(document.getElementById("modal"));
   const modalImage = document.getElementById("modalImage");

   // Function untuk memunculkan modal saat preview gambar di click
   function showModal(fileName) {
      bootstrapModal.show();
      modalImage.src = `/uploads/img/${fileName}`;
   }
</script>