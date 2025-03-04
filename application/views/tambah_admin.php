<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">tambah data admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
<form action="<?= base_url('admin/tambah_aksi') ?>" method="POST">
    <div class="form-group">
        <label>ussername</label>
        <input type="text" name="ussername" class="form-control">
        <?= form_error('ussername', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    
    <div class="form-group">
        <label>password</label>
        <input type="text" name="password" class="form-control">
        <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class=""></i>Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-drash"></i>reset</button>
</form>