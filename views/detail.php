<?php
$title = 'Detail Pegawai';
ob_start();
?>

<div class="container">
  <h1 class="text-center my-4">Detail Pegawai</h1>

  <div class="card p-4 shadow-sm">
    <img src="<?= isset($employee['image']) ? $employee['image'] : "assets/img/employee.jpg" ?>" alt="Gambar Pegawai"
      style="max-width: 150px;"><br>

    <div class="row mb-3">
      <div class="col-md-3 fw-bold">ID</div>
      <div class="col-md-9"><?= $employee['id'] ?></div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3 fw-bold">Nama</div>
      <div class="col-md-9"><?= $employee['name'] ?></div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3 fw-bold">Email</div>
      <div class="col-md-9"><?= $employee['email'] ?></div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3 fw-bold">Jabatan</div>
      <div class="col-md-9"><?= $employee['position'] ?></div>
    </div>

    <div class="row mb-3">
      <div class="col-md-3 fw-bold">Gaji</div>
      <div class="col-md-9">Rp<?= $employee['salary'] ?></div>
    </div>

    <div class="d-flex justify-content-between">
      <a href="index.php?action=edit&id=<?= $employee['id'] ?>" class="btn btn-primary">Edit Pegawai</a>
      <a href="index.php?action=list" class="btn btn-secondary">Kembali ke Daftar Pegawai</a>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
include 'views/layout/layout.php';