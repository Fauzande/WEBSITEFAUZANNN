<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>LOGIN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukkan username, password, dan role</p>

      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
          <?= $this->session->flashdata('error') ?>
        </div>
      <?php endif; ?>

      <form action="<?= base_url('login/authenticate') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control form-control-sm" placeholder="Username" required>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control form-control-sm" placeholder="Password" required>
        </div>
        <div class="input-group mb-3">
          <select name="role" class="form-control form-control-sm" required>
            <option value="">-- Pilih Role --</option>
            <option value="kakomli">Kakomli</option>
            <option value="wakil_kepsek">Wakil Kepsek</option>
            <option value="wali_kelas">Wali Kelas</option>
            <option value="kurikulum">Kurikulum</option>
            <option value="admin">Admin</option>
            <option value="pelapor">pelapor</option>
          </select>
        </div>
        <div class="row">
          <div class="col-6 p-0">
          </div>
          <div class="col-6 p-0">
            <button type="submit" class="btn btn-primary btn-sm btn-block">
              Sign In
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
