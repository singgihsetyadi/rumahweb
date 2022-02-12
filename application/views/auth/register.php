<div class="container-fluid vh-100">
  <div class="rounded d-flex justify-content-center">
    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
      <div class="text-center">
        <h3 class="text-primary">Registrasi</h3>
      </div>
      <form action="<?= base_url('auth/register'); ?>" method="POST">
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
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <?= form_error('password'); ?>
        </div>
        <div class="mb-3">
          <label for="passconf" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="passconf" id="passconf" placeholder="Password">
          <?= form_error('passconf'); ?>
        </div>
        <div class="mb-3">
          <label for="birth" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" name="birth" id="birth" value="<?= set_value('birth'); ?>" placeholder="Tanggal lahir">
          <?= form_error('birth'); ?>
        </div>
        <button class="btn btn-primary text-center mt-2" type="submit">
          Daftar
        </button>
        <p class="text-center mt-2">Sudah punya akun?
          <a href="<?= base_url('auth/login'); ?>" class="text-primary">Login</a>
        </p>
      </form>
    </div>
  </div>
</div>