<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">User Management</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('user/tambah') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus"></i> Tambah User
                            </a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Password</th> 
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jurusan</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user as $usr) : ?>
                                        <tr>
                                            <td><?= $usr->username ?></td>
                                            <td>********</td> 
                                            <td><?= $usr->nama ?></td>
                                            <td><?= $usr->email ?></td>
                                            <td><?= $usr->nama_jurusan ?></td> 
                                            <td><?= ucfirst($usr->role) ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#edit<?= $usr->id ?>" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="<?= base_url('user/delete/' . $usr->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- Modal Edit -->
                        <?php foreach ($user as $usr) : ?>
                            <div class="modal fade" id="edit<?= $usr->id ?>" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit User</h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span>&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url('user/edit/' . $usr->id) ?>" method="POST">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" value="<?= $usr->username ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control"value="<?= $usr->password ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama</label>
                                                    <input type="text" name="nama" class="form-control" value="<?= $usr->nama ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" name="email" class="form-control" value="<?= $usr->email ?>" required>
                                                </div>
                                                <div class="form-group">
                                                <label>Jurusan</label>
                                                 <select name="jurusan_id" class="form-control" required>
                                               <option value="">-- Pilih Jurusan --</option>
                                                <?php foreach ($jurusan as $jjs) : ?>
                                                    <option value="<?= $jjs->id ?>" <?= ($usr->jurusan_id == $jjs->id) ? 'selected' : '' ?>>
                                                <?= $jjs->nama_jurusan ?> 
                                                 </option>
                                                 <?php endforeach; ?>
                                                 </select>
                                                 </div>

                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select name="role" class="form-control" required>
                                                        <option value="kakomli" <?= ($usr->role == 'kakomli') ? 'selected' : '' ?>>Kakomli</option>
                                                        <option value="wakil_kepsek" <?= ($usr->role == 'wakil_kepsek') ? 'selected' : '' ?>>Wakil Kepsek</option>
                                                        <option value="wali_kelas" <?= ($usr->role == 'wali_kelas') ? 'selected' : '' ?>>Wali Kelas</option>
                                                        <option value="kurikulum" <?= ($usr->role == 'kurikulum') ? 'selected' : '' ?>>Kurikulum</option>
                                                        <option value="admin" <?= ($usr->role == 'admin') ? 'selected' : '' ?>>Admin</option>
                                                        <option value="admin" <?= ($usr->role == 'pelapor') ? 'selected' : '' ?>>pelapor</option>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
