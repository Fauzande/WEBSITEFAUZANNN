<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Riwayat Pengaduan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat Pengaduan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              <a href="<?= base_url('RiwayatPengaduan/tambah') ?>" class="btn btn-primary btn-sm">
                  <i class="fas fa-plus"></i> Tambah Riwayat Pengaduan
                </a>
              </div>
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>pengaduan</th>
                      <th>Username</th>
                      <th>Status</th>
                      <th>Catatan</th>
                      <th>tanggal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($riwayat_pengaduan as $rp) : ?>
                      <tr>
                      <td><?= $rp->judul ?></td>
                      <td><?= $rp->username ?></td>
                        <td><?= ucfirst($rp->status) ?></td>
                        <td><?= $rp->catatan ?></td>
                        <td><?= $rp->tanggal ?></td>
                        <td>
                          <button data-toggle="modal" data-target="#edit<?= $rp->id ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                          </button>
                          <a href="<?= base_url('riwayatpengaduan/delete/' . $rp->id) ?>" 
                             class="btn btn-danger btn-sm" 
                             onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>

              <!-- Modal Edit -->
              <?php foreach($riwayat_pengaduan as $rp) : ?>
                <div class="modal fade" id="edit<?= $rp->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Riwayat Pengaduan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      
                      <div class="modal-body">
                        <form action="<?= base_url('riwayatpengaduan/edit/' . $rp->id) ?>" method="POST">
                          <input type="hidden" name="redirect_url" value="<?= current_url() ?>">
                          <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                              <option value="diajukan" <?= ($rp->status == 'diajukan') ? 'selected' : '' ?>>Diajukan</option>
                              <option value="diproses" <?= ($rp->status == 'diproses') ? 'selected' : '' ?>>Diproses</option>
                              <option value="ditolak" <?= ($rp->status == 'ditolak') ? 'selected' : '' ?>>Ditolak</option>
                              <option value="diselesaikan" <?= ($rp->status == 'diselesaikan') ? 'selected' : '' ?>>Diselesaikan</option>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label>Catatan</label>
                            <textarea name="catatan" class="form-control"><?= $rp->catatan ?></textarea>
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
              <?php endforeach ?>

            </div>
          </div>
        </div>
      </div>
    </section>
</div>
