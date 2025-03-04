<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Data User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">Form Tambah User</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('user/tambah_aksi') ?>" method="POST">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                    <?= form_error('username', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <?= form_error('password', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                    <?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                    <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                                
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <select name="jurusan_id" class="form-control">
                                        <option value="">-- Pilih Jurusan --</option>
                                        <?php foreach ($jurusan as $jjs) : ?>
                                            <option value="<?= $jjs->id ?>"><?= $jjs->nama_jurusan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="kakomli">Kakomli</option>
                                        <option value="wakil_kepsek">Wakil Kepsek</option>
                                        <option value="wali_kelas">Wali Kelas</option>
                                        <option value="kurikulum">Kurikulum</option>
                                        <option value="pelapor">pelapor</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fas fa-save"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Reset
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
