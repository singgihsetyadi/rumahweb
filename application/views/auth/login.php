<div class="container-fluid vh-100 mt-5">
  <div class="rounded d-flex justify-content-center">
    <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
      <div class="text-center">
        <h3 class="text-primary">Login</h3>
      </div>
      <form action="<?= base_url('auth/login'); ?>" method="POST">
        <div class="p-4">
          <div class="input-group mb-3">
            <span class="input-group-text bg-primary"></span>
            <input type="email" name="email" id="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email">
            <?= form_error('email'); ?>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-primary"></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="password">
            <?= form_error('password'); ?>
          </div>
          <button class="btn btn-primary text-center mt-2" type="submit">
            Login
          </button>
          <p class="text-center mt-5">Belum punya akun?
            <a href="<?= base_url('auth/register'); ?>" class="text-primary">Daftar</a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>