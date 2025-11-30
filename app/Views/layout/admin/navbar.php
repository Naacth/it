<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('admin') ?>" style="font-family: 'Space Grotesk', sans-serif; font-weight: 600; font-size: 1.25rem;">
            Admin Panel
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/news') ?>">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/pegawai') ?>">Pegawai</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= base_url('admin/news/new') ?>" class="btn btn-primary mr-2">New Post</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pegawai/new') ?>" class="btn btn-primary mr-3">Tambah Pegawai</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('admin/setting') ?>">Setting</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('/logout') ?>">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>