<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Riwayat Pengaduan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat Pengaduan</li>
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
<form action="<?= base_url('riwayatpengaduan/tambah_aksi') ?>" method="POST">
<div class="form-group">
   <label>pengaduan</label>
  <select name="pengaduan_id" class="form-control">
  <option value="">-- Pilih pengaduan --</option>
   <?php foreach ($pengaduan as $pgn) : ?>
   <option value="<?= $pgn->id ?>"><?= $pgn->judul ?></option>
   <?php endforeach; ?>
  </select>
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
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control"></textarea>
        <?= form_error('deskripsi', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Diajukan</label>
        <input type="date" name="tanggal_diajukan" class="form-control">
        <?= form_error('tanggal_diajukan', '<div class="text-small text-danger">', '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="diajukan">Diajukan</option>
            <option value="diproses">Diproses</option>
            <option value="ditolak">Ditolak</option>
            <option value="diselesaikan">Diselesaikan</option>
        </select>
    </div>
  
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>
