  <main>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="<?= base_url(); ?>">Rumahweb</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <!-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">User</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('auth/logout'); ?>">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-3">
      <div class="card">
        <h5 class="card-header">Tambah Data User</h5>
        <div class="card-body">
          <form action="<?= base_url('dashboard/add'); ?>" method="POST">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama'); ?>" placeholder="Nama">
              <?= form_error('nama'); ?>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Email harus @rumahweb.co.id">
              <?= form_error('email'); ?>
            </div>
            <button class="btn btn-primary text-center mt-2" type="submit">
              Tambah
            </button>
          </form>
        </div>
      </div>
    </div>
  </main>