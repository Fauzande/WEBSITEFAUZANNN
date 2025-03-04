
              <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">pengaduan</h1>
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
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="<?= base_url('pengaduan/tambah') ?>"class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>tambah pengaduan</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>judul</th>
                    <th>Foto</th>
                    <th>deskripsi</th>
                    <th>tanggal di ajukan</th>
                    <th>total pengguna</th>
                    <th>username</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($pengaduan as $pgn) : ?>
                  <tr>
                    <td><?= $pgn->judul ?>
                    </td>
                    <td>
                    <img src="<?= base_url('asset/Foto/' . $pgn->Foto) ?>" alt="" width="200" onerror="this.src='<?= base_url('asset/Foto/default.png') ?>'">
                    </td>
                    <td><?= $pgn->deskripsi ?></td>
                    <td><?= $pgn->tanggal_diajukan?></td>
                    <td><?= $pgn->total_pengguna ?>
                    </td>
                    <td><?= $pgn->username ?></td>
                    <td>
                    <button data-toggle="modal" data-target="#edit<?= $pgn->id ?>"  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                    <a href="<?= base_url('pengaduan/delete/' . $pgn->id) ?>"class="btn btn-danger btn-sm"onclick="return confirm('apakah anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  </tfoot>
                  <?php endforeach ?>
                </table>
              </div>
                            <!-- Modal Edit Pengaduan -->
<?php foreach ($pengaduan as $pgn) : ?>
<div class="modal fade" id="edit<?= $pgn->id ?>" tabindex="-1" aria-labelledby="editLabel<?= $pgn->id ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel<?= $pgn->id ?>">Edit Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pengaduan/edit/' . $pgn->id) ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" value="<?= $pgn->judul ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Foto</label><br>
                        <?php if (!empty($pgn->Foto)) : ?>
                            <img src="<?= base_url('asset/Foto/' . $pgn->Foto) ?>" alt="Foto Pengaduan" width="100" class="mb-2">
                        <?php else : ?>
                            <p>Tidak ada foto</p>
                        <?php endif; ?>
                        <input type="file" name="Foto" class="form-control">
                        <input type="hidden" name="Foto_lama" value="<?= $pgn->Foto ?>">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required><?= $pgn->deskripsi ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Diajukan</label>
                        <input type="date" name="tanggal_diajukan" class="form-control" value="<?= $pgn->tanggal_diajukan ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Total Pengguna</label>
                        <input type="number" name="total_pengguna" class="form-control" value="<?= $pgn->total_pengguna ?>" required>
                    </div>

                    <div class="form-group">
                    <label>User</label>
                    <select name="user_id" class="form-control" required>
                   <option value="">-- Pilih User --</option>
                   <?php foreach ($users as $usr) : ?>
                   <option value="<?= $usr->id ?>" <?= ($pgn->user_id == $usr->id) ? 'selected' : '' ?>>
                   <?= $usr->username ?> 
                   </option>
                   <?php endforeach; ?>
                   </select>
                   </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
