<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<style>
.pegawai-detail-page {
    position: relative;
    z-index: 1;
}

.pegawai-detail-card {
    background: var(--card-bg);
    border-radius: 24px;
    padding: 2.5rem;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
}

.pegawai-detail-avatar {
    width: 170px;
    height: 170px;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid var(--accent);
    box-shadow: 0 10px 28px rgba(127, 91, 255, 0.25);
}

.pegawai-detail-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pegawai-detail-avatar-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    font-size: 4rem;
    font-weight: 700;
    font-family: 'Space Grotesk', sans-serif;
}

.pegawai-detail-name {
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    font-size: 2rem;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
}

.pegawai-detail-meta {
    color: var(--text-muted);
    font-size: 0.95rem;
}

.pegawai-detail-label {
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: var(--text-muted);
    margin-bottom: 0.15rem;
}

.pegawai-detail-value {
    font-size: 1.05rem;
    color: var(--text-primary);
    font-weight: 500;
}

.pegawai-detail-badge {
    display: inline-block;
    padding: 0.5rem 1.25rem;
    border-radius: 999px;
    font-weight: 600;
    font-size: 0.85rem;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    box-shadow: 0 4px 14px rgba(127, 91, 255, 0.3);
}

@media (max-width: 768px) {
    .pegawai-detail-card {
        padding: 1.75rem;
    }

    .pegawai-detail-avatar {
        width: 140px;
        height: 140px;
        margin-bottom: 1rem;
    }
}
</style>

<div class="container my-5 pegawai-detail-page">
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('pegawai') ?>">Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc($pegawai['nama_pegawai']) ?></li>
        </ol>
    </nav>

    <div class="pegawai-detail-card">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-4 mb-md-0">
                <div class="pegawai-detail-avatar mx-auto">
                    <?php if (!empty($pegawai['foto_pegawai'])): ?>
                        <img src="<?= base_url('uploads/pegawai/' . $pegawai['foto_pegawai']) ?>"
                             alt="<?= esc($pegawai['nama_pegawai']) ?>">
                    <?php else: ?>
                        <div class="pegawai-detail-avatar-initial">
                            <?= strtoupper(substr($pegawai['nama_pegawai'], 0, 1)) ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
                    <div>
                        <h1 class="pegawai-detail-name mb-1"><?= esc($pegawai['nama_pegawai']) ?></h1>
                        <div class="pegawai-detail-meta">
                            <?php if ($pegawai['jenis_kelamin'] === 'laki-laki'): ?>
                                Laki-laki
                            <?php else: ?>
                                Perempuan
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <span class="pegawai-detail-badge"><?= esc($pegawai['divisi']) ?></span>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <div class="pegawai-detail-label">Nama Lengkap</div>
                        <div class="pegawai-detail-value"><?= esc($pegawai['nama_pegawai']) ?></div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="pegawai-detail-label">Jenis Kelamin</div>
                        <div class="pegawai-detail-value">
                            <?php if ($pegawai['jenis_kelamin'] === 'laki-laki'): ?>
                                Laki-laki
                            <?php else: ?>
                                Perempuan
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="pegawai-detail-label">Divisi</div>
                        <div class="pegawai-detail-value"><?= esc($pegawai['divisi']) ?></div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="pegawai-detail-label">Tanggal Lahir</div>
                        <div class="pegawai-detail-value">
                            <?php if (!empty($pegawai['tanggal_lahir'])): ?>
                                <?= date('d M Y', strtotime($pegawai['tanggal_lahir'])) ?>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-secondary">
                        &larr; Kembali ke daftar pegawai
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>


