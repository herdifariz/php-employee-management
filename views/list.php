<?php
$title = 'Daftar Pegawai';
ob_start();
?>

<div class="container">
  <h1 class="text-center my-4">Daftar Pegawai</h1>
  <a href="index.php?action=add" class="btn btn-success">&#43; Tambah Data</a>
  <form class="d-flex my-2" method="GET" action="index.php">
    <input type="hidden" name="action" value="list">
    <input class="form-control me-2" type="search" placeholder="Search" name="search"
      value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>">
    <button class="btn btn-outline-primary" type="submit">Search</button>
  </form>
  <div class="table-responsive-md">
    <?php if (empty($employees)): ?>
      <p class="text-center my-4">Data Tidak Ditemukan</p>
    <?php else: ?>
      <table class="table">
        <tr>
          <th>ID</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          <th>Action</th>
        </tr>
        <?php foreach ($employees as $employee): ?>
          <tr>
            <td><?= $employee['id'] ?></td>
            <td><img src="<?= isset($employee['image']) ? $employee['image'] : "assets/img/employee.jpg" ?>"
                alt="Gambar Pegawai" class="employee-img"></td>
            <td><?= $employee['name'] ?></td>
            <td><?= $employee['email'] ?></td>
            <td><?= $employee['position'] ?></td>
            <td>Rp<?= $employee['salary'] ?></td>
            <td>
              <a href="index.php?action=detail&id=<?= $employee['id'] ?>" class="btn btn-primary m-1">Detail</a>
              <a href="index.php?action=edit&id=<?= $employee['id'] ?>" class="btn btn-warning m-1">Edit</a>
              <button type="button" class="btn btn-danger m-1" data-bs-toggle="modal"
                data-bs-target="#deleteModal<?= $employee['id'] ?>">
                Hapus
              </button>
            </td>
          </tr>
          <div class="modal fade" id="deleteModal<?= $employee['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="deleteModalLabel">Hapus Data</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Apakah Anda Yakin?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                  <a href="index.php?action=delete&id=<?= $employee['id'] ?>">
                    <button type="button" class="btn btn-danger">Ya</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>

</div>

<?php
$content = ob_get_clean();
include 'views/layout/layout.php';
?>