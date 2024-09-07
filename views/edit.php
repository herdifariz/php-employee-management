<?php
$title = 'Edit Data Pegawai';
ob_start();
?>

<div class="container">
  <a href="index.php?action=list" class="btn btn-secondary my-2">Kembali ke Daftar Pegawai</a>
  <h1 class="mb-4 text-center">Edit Pegawai</h1>

  <form method="POST" action="index.php?action=edit&id=<?= $employee['id'] ?>" enctype="multipart/form-data"
    onsubmit="return validateForm()">
    <img src="<?= isset($employee['image']) ? $employee['image'] : "assets/img/employee.jpg" ?>" alt="Gambar Pegawai"
      class="employee-img"><br>
    <a href="index.php?action=deleteimage&id=<?= $employee['id'] ?>" class="text-decoration-none mb-2">Hapus Foto</a>

    <div class="mb-3 row">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" value="<?= $employee['name'] ?>" required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" name="email" value="<?= $employee['email'] ?>" required
          oninput="validateEmail()">
        <small id="emailError" style="color: red;"></small>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="position" class="col-sm-2 col-form-label">Jabatan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="posistion" name="position" value="<?= $employee['position'] ?>"
          required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="salary" class="col-sm-2 col-form-label">Gaji</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="salary" name="salary" value="<?= $employee['salary'] ?>" required>
      </div>
    </div>
    <div class="mb-3 row">
      <label for="foto" class="col-sm-2 col-form-label">Foto</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="foto" name="image" accept="image/*">
      </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 my-2">Edit</button>
  </form>
</div>

<?php
$content = ob_get_clean();
include 'views/layout/layout.php';