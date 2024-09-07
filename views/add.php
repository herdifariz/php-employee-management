<?php
$title = 'Tambah Data Pegawai';
ob_start();
?>

<div class="container">
  <a href="index.php?action=list" class="btn btn-secondary my-2">Kembali ke Daftar Pegawai</a>
  <h1 class="text-center my-4">Tambah Pegawai</h1>

  <form method="POST" action="index.php?action=add" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="mb-3 row">
      <label for="name" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required
          oninput="validateEmail()">
        <small id="emailError" style="color: red;"></small>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="position" class="col-sm-2 col-form-label">Jabatan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="posistion" name="position" placeholder="Pegawai" required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="salary" class="col-sm-2 col-form-label">Gaji</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="salary" name="salary" placeholder="1000000" required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="foto" class="col-sm-2 col-form-label">Foto</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="foto" name="image" accept="image/*">
      </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Tambah</button>
  </form>
</div>

<?php
$content = ob_get_clean();
include 'views/layout/layout.php';