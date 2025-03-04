<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">tambah data pengaduan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">pengaduan</li>
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
<?php echo form_open_multipart('pengaduan/tambah_aksi'); ?>
    <div class="form-group">
        <label>judul</label>
        <input type="text" name="judul" class="form-control">
        <?= form_error('judul', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="Foto" class="form-control">
        <?= form_error('Foto', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
        <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>tanggal di ajukan</label>
        <input type="date" name="tanggal_diajukan" class="form-control">
        <?= form_error('tanggal_diajukan', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>total pengguna</label>
        <input type="text" name="total_pengguna" class="form-control">
        <?= form_error('total_pengguna', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
   <label>user</label>
  <select name="user_id" class="form-control">
  <option value="">-- Pilih user --</option>
   <?php foreach ($users as $usr) : ?>
   <option value="<?= $usr->id ?>"><?= $usr->username ?></option>
   <?php endforeach; ?>
  </select>
  </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class=""></i>Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-drash"></i>reset</button>
    <?php echo form_close(); ?>
</for>