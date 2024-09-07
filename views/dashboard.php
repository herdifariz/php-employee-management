<?php
$title = 'Dashboard';
ob_start();
?>

<div class="container">
  <h1 class="text-center my-4 display-4 fw-bold">Aplikasi Manajemen Pegawai</h1>

  <div class="row justify-content-center mb-5">
    <div class="col-md-6">
      <div class="card shadow-sm p-4 text-center border-0 my-4" style="min-height: 200px;">
        <i class="fas fa-users fa-3x text-primary mb-3"></i>
        <a href="index.php?action=list">
          <button class="btn btn-outline-primary btn-lg w-100" type="button">Lihat Daftar Pegawai</button>
        </a>
      </div>
      <div class="card shadow-sm p-4 text-center border-0 my-4" style="min-height: 200px;">
        <i class="fas fa-user-plus fa-3x text-primary mb-3"></i>
        <a href="index.php?action=add">
          <button class="btn btn-outline-primary btn-lg w-100" type="button">Tambah Pegawai</button>
        </a>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include 'views/layout/layout.php';