
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">jurusan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">jurusan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <a href="<?= base_url('jurusan/tambah')?>"class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> tambah jurusan</a>
                <a class="btn btn-danger btn-sm" href="<?= base_url('jurusan/print') ?>"><i class="fa fa-print"></i> print</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>nama jurusan</th>
                    <th>code jurusan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <?php 
                  foreach($jurusan as $jjs) : ?>
                  <tbody>
                  <tr>
                    <td><?= $jjs->nama_jurusan ?>
                    </td>
                    <td><?= $jjs->code_jurusan ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit<?= $jjs->id ?>"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                        <a href="<?= base_url('jurusan/delete/' . $jjs->id) ?>"class="btn btn-danger btn-sm"onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  </tfoot>
                  <?php endforeach ?>
                </table>
              </div>

<!-- Modal edit -->
 <?php foreach($jurusan as $jjs) : ?>
<div class="modal fade" id="edit<?= $jjs->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('jurusan/edit/' . $jjs->id) ?>" method="POST">
            <div class="form-group">
             <label>Nama jurusan</label>
            <input type="text" name="nama_jurusan" class="form-control" value="<?= $jjs->nama_jurusan ?>">
           <?= form_error('nama_jurusan', '<div class="text-small text-danger">', '</div>'); ?>
             </div>
    
             <div class="form-group">
          <label>code jurusan</label>
          <input type="text" name="code_jurusan" class="form-control" value="<?= $jjs->code_jurusan ?>">
          <?= form_error('code_jurusan', '<div class="text-small text-danger">', '</div>'); ?>
          </div>
          <div class="modal-footer"></div>
         <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i>Simpan</button>
         <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-drash"></i>reset</button>
         </div>
        </form>
            </div>
        </div>
    </div>
</div>
 <?php endforeach ?>