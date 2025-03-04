<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="" alt="" class="" style="opacity: .8">
        <span class="brand-text font-weight-light">Pengaduan Masyarakat</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- User Info -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block text-white">
                    <?= ucfirst($this->session->userdata('username') ?: 'Guest'); ?> 
                    <span class="badge badge-info"><?= ucfirst($this->session->userdata('role') ?: 'User'); ?></span>
                </span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Menu berdasarkan Role -->
                <?php $role = $this->session->userdata('role'); ?>

                <?php if ($role == 'admin'): ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                               JURUSAN AND USER
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('jurusan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>jurusan</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>USER</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if ($role == 'kakomli' || $role == 'wakil_kepsek' || $role == 'wali_kelas' || $role == 'pelapor' || $role == 'kurikulum' || $role == 'admin'): ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Data Pengaduan
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('pengaduan') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Bikin Pengaduan</p>
                                </a>
                            </li>
                            <?php if ($role == 'wali_kelas' || $role == 'kurikulum' || $role == 'admin'): ?>
                                <li class="nav-item">
                                    <a href="<?= base_url('riwayatpengaduan') ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Riwayat Pengaduan</p>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- Logout -->
                <li class="nav-item mt-4">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
