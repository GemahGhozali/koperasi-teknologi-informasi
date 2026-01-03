<!-- Breadcrumbs -->
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="py-2 mb-4">
   <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Manajemen User</li>
   </ol>
</nav>

<!-- Header -->
<header class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-end gap-3 mb-4">
   <div>
      <h3 class="mb-2 fw-bold">Manajemen User</h3>
      <p class="m-0 text-body-secondary">Kelola semua data pengguna disini</p>
   </div>
   <a href="/dashboard/manage-user/create" class="btn btn-dark">
      Tambah User
      <i class="bi bi-plus-lg"></i>
   </a>
</header>

<!-- User Table -->
<div class="table-responsive border border-2 border-black drop-shadow-lg rounded-2">
   <table class="table table-borderless table-striped m-0 align-middle">
      <thead class="sticky-top">
         <tr>
            <th class="text-center">Avatar</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Password</th>
            <th>Auth</th>
            <th>Created At</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php 
            foreach ($users as $user) { ?>
               <tr>
                  <td>
                     <div class="bg-dark-subtle rounded-circle overflow-hidden mx-auto" style="width: 50px; height: 50px;">
                        <img
                           src=<?="/uploads/img/" . $user["avatar"]?> 
                           alt=<?=$user["avatar"]?> 
                           class="w-100 h-100 object-fit-cover"
                        >
                     </div>
                  </td>
                  <td><?=$user["id"]?></td>
                  <td><?=$user["nama"]?></td>
                  <td><?=$user["username"]?></td>
                  <td><?=$user["password"]?></td>
                  <td><?=$user["auth"]?></td>
                  <td><?=$user["timestamp"]?></td>
                  <td>
                     <a href=<?="/dashboard/manage-user/edit/{$user['id']}"?> class="btn btn-primary">Edit</a>

                     <a href=<?="/users/delete/{$user['id']}"?> class="btn btn-danger">Delete</a>

                     <?php if ($user["aktif"] === "1") {?>
                        <a href=<?="/users/deactivate/{$user['id']}"?> class="btn btn-secondary">
                           Non Active
                        </a>
                     <?php }?>

                     <?php if ($user["aktif"] === "0") {?>
                        <a href=<?="/users/activate/{$user['id']}"?> class="btn btn-success">Active</a>
                     <?php }?>
                  </td>
               </tr>
         <?php } ?>
      </tbody>
   </table>
</div>