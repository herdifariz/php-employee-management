<header class="d-flex flex-wrap justify-content-between py-3 mx-4 border-bottom">
  <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
    <img src="assets/img/logo.png" alt="" style="width: 40px">
    <span class="fs-4 mx-2">Dashboard</span>
  </a>

  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-sign-out-alt"></i> Log Out
  </button>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Log Out</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda Yakin?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
          <a href="index.php?action=logout">
            <button type="button" class="btn btn-danger">Ya</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>