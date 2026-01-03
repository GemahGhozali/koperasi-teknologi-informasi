<!-- Header -->
<header class="mb-4">
   <h3 class="mb-2 fw-bold">Pengajuan Layanan</h3>
   <p class="m-0 text-body-secondary">Lihat semua data pengajuan layanan dari anggota</p>
</header>

<div class="mb-4 d-flex justify-content-between">
   <div class="d-flex gap-2">
      <a href="/dashboard/pengajuan-layanan" id="pegadaian" class="tab btn">
         Pegadaian
      </a>
      <a href="/dashboard/pengajuan-layanan/peminjaman" id="peminjaman" class="tab btn">
         Peminjaman
      </a>
      <a href="/dashboard/pengajuan-layanan/penitipan" id="penitipan" class="tab btn">
         Penitipan
      </a>
   </div>
   
   <form id="statusOptionForm" method="GET" class="d-flex gap-3 align-items-center">
      <label class="fw-semibold text-nowrap" for="status">Status Pengajuan :</label>
      <select id="status" name="status" class="form-select border-dark-subtle" onchange="handleStatusChange()">
         <option value="">Semua</option>
         <option value="review">Review</option>
         <option value="disetujui">Disetujui</option>
         <option value="ditolak">Ditolak</option>
      </select>
   </form>
</div>

<?php require_once __DIR__ . "/" . $currentTab . "/index.php"?>

<script>
   const tabs = document.querySelectorAll(".tab");
   const currentTab = "<?=$currentTab?>";

   tabs.forEach((tab) => {
      if (tab.id === currentTab.toLowerCase()) {
         tab.classList.add("btn-dark");
      } else {
         tab.classList.add("btn-outline-dark");
      }
   });
   
   const statusOptions = document.querySelectorAll("#status option");
   const params = new URLSearchParams(window.location.search);
   
   if (params.has("status")) {
      statusOptions.forEach((option) => {
         if (option.value === params.get("status")) {
            option.setAttribute("selected", "selected");
         }
      });
   }

   function handleStatusChange() {
      const select = document.getElementById("status");

      if (select.value === "") {
         window.location.href = window.location.pathname;
      } else {
         document.getElementById("statusOptionForm").submit();
      }
   }

</script>