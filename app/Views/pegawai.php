<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<style>
.pegawai-page {
    position: relative;
    z-index: 1;
}

.pegawai-header {
    text-align: center;
    margin-bottom: 3rem;
    padding: 2rem 0;
}

.pegawai-header h1 {
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    font-size: 2.5rem;
    color: var(--text-primary);
    margin-bottom: 0.5rem;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.pegawai-header p {
    color: var(--text-muted);
    font-size: 1.1rem;
}

.divisi-tabs {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 1rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
}

.divisi-tabs .nav-pills .nav-link {
    border-radius: 12px;
    padding: 0.75rem 1.5rem;
    margin: 0 0.25rem;
    font-weight: 500;
    color: var(--text-secondary);
    transition: background-color 0.2s ease, color 0.2s ease;
    border: 2px solid transparent;
}

.divisi-tabs .nav-pills .nav-link:hover {
    background: var(--bg-secondary);
    color: var(--accent);
}

.divisi-tabs .nav-pills .nav-link.active {
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    border-color: var(--accent);
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.pegawai-card {
    background: var(--card-bg);
    border-radius: 20px;
    padding: 2rem;
    height: 100%;
    transition: box-shadow 0.2s ease, border-color 0.2s ease;
    border: 1px solid var(--border-color);
    box-shadow: var(--shadow-sm);
}

.pegawai-card:hover {
    box-shadow: var(--shadow-md);
    border-color: var(--accent);
}

.pegawai-avatar {
    width: 140px;
    height: 140px;
    margin: 0 auto 1.5rem;
    position: relative;
    border-radius: 50%;
    overflow: hidden;
    border: 4px solid var(--accent);
    box-shadow: 0 8px 24px rgba(127, 91, 255, 0.2);
}

.pegawai-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.pegawai-avatar-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    font-size: 3.5rem;
    font-weight: 700;
    font-family: 'Space Grotesk', sans-serif;
}

.pegawai-name {
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 600;
    font-size: 1.35rem;
    color: var(--text-primary);
    margin-bottom: 0.75rem;
}

.pegawai-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.4rem;
    margin-bottom: 1rem;
}

.pegawai-info-item {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    color: var(--text-secondary);
    font-size: 0.95rem;
}

.pegawai-info-item svg {
    width: 18px;
    height: 18px;
    fill: currentColor;
}

.pegawai-divisi-badge {
    display: inline-block;
    padding: 0.5rem 1.25rem;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.85rem;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.25);
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--card-bg);
    border-radius: 20px;
    border: 2px dashed var(--border-color);
}

.empty-state-icon {
    width: 64px;
    height: 64px;
    margin: 0 auto 1rem;
    opacity: 0.5;
}

.empty-state-icon svg {
    width: 100%;
    height: 100%;
    fill: currentColor;
    color: var(--text-muted);
}

.empty-state-text {
    color: var(--text-muted);
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .pegawai-header h1 {
        font-size: 2rem;
    }
    
    .divisi-tabs .nav-pills .nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .pegawai-avatar {
        width: 120px;
        height: 120px;
    }
}
</style>

<div class="container my-5 pegawai-page">
    <div class="pegawai-header">
        <h1>Data Pegawai</h1>
        <p>Daftar pegawai berdasarkan divisi</p>
    </div>

    <!-- Menu Divisi -->
    <div class="divisi-tabs">
        <ul class="nav nav-pills nav-justified" id="divisiTab" role="tablist">
            <?php foreach ($divisiList as $index => $divisi): ?>
            <li class="nav-item" role="presentation">
                <a class="nav-link <?= $index === 0 ? 'active' : '' ?>" 
                   id="divisi-<?= strtolower($divisi) ?>-tab" 
                   data-toggle="tab" 
                   href="#divisi-<?= strtolower($divisi) ?>" 
                   role="tab"
                   aria-controls="divisi-<?= strtolower($divisi) ?>"
                   aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                    <?= $divisi ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <!-- Content Divisi -->
    <div class="tab-content" id="divisiTabContent">
        <?php foreach ($divisiList as $index => $divisi): ?>
        <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>" 
             id="divisi-<?= strtolower($divisi) ?>" 
             role="tabpanel">
            <div class="row">
                <?php if (empty($pegawaiByDivisi[$divisi])): ?>
                    <div class="col-12">
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/>
                                </svg>
                            </div>
                            <p class="empty-state-text mb-0">Belum ada data pegawai di divisi <strong><?= $divisi ?></strong></p>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($pegawaiByDivisi[$divisi] as $pegawai): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="pegawai-card">
                            <div class="pegawai-avatar">
                                <?php if (!empty($pegawai['foto_pegawai'])): ?>
                                    <img src="<?= base_url('uploads/pegawai/' . $pegawai['foto_pegawai']) ?>" 
                                         alt="<?= esc($pegawai['nama_pegawai']) ?>">
                                <?php else: ?>
                                    <div class="pegawai-avatar-initial">
                                        <?= strtoupper(substr($pegawai['nama_pegawai'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="pegawai-name"><?= esc($pegawai['nama_pegawai']) ?></h5>
                            <div class="pegawai-info">
                                <div class="pegawai-info-item">
                                    <?php if ($pegawai['jenis_kelamin'] === 'laki-laki'): ?>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.5 11c1.38 0 2.5-1.12 2.5-2.5S10.88 6 9.5 6 7 7.12 7 8.5 8.12 11 9.5 11zm0 1C6.46 12 4 14.46 4 17.5V20h2v-2.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5V20h2v-2.5C15.5 14.46 13.04 12 9.5 12zm8.5-1c1.38 0 2.5-1.12 2.5-2.5S19.38 6 18 6s-2.5 1.12-2.5 2.5S16.62 11 18 11zm0 1c-3.04 0-5.5 2.46-5.5 5.5V20h2v-2.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5V20h2v-2.5C23.5 14.46 21.04 12 18 12z"/>
                                        </svg>
                                        <span>Laki-laki</span>
                                    <?php else: ?>
                                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12 5.5c1.38 0 2.5-1.12 2.5-2.5S13.38.5 12 .5 9.5 1.62 9.5 3s1.12 2.5 2.5 2.5zm-5 0C8.38 5.5 9.5 4.38 9.5 3S8.38.5 7 .5 4.5 1.62 4.5 3 5.62 5.5 7 5.5zm10 0c1.38 0 2.5-1.12 2.5-2.5S18.38.5 17 .5 14.5 1.62 14.5 3s1.12 2.5 2.5 2.5zM12 7c-2.33 0-7 1.17-7 3.5V12h14v-1.5C19 8.17 14.33 7 12 7zm-5 4.5v3h-1v-3c0-.83.67-1.5 1.5-1.5S9 9.67 9 10.5v3H8v-3zm10 0v3h-1v-3c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v3h-1v-3z"/>
                                        </svg>
                                        <span>Perempuan</span>
                                    <?php endif; ?>
                                </div>
                                <div class="pegawai-info-item">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H5V9h14v11zm0-13H5V6h14v1z"/>
                                    </svg>
                                    <span>
                                        <?php if (!empty($pegawai['tanggal_lahir'])): ?>
                                            <?= date('d M Y', strtotime($pegawai['tanggal_lahir'])) ?>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="pegawai-divisi-badge"><?= esc($pegawai['divisi']) ?></span>
                                <?php if (!empty($pegawai['id_pegawai'])): ?>
                                    <a href="<?= base_url('pegawai/' . $pegawai['id_pegawai']) ?>" class="btn btn-sm btn-outline-primary">
                                        Detail
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
// Initialize Bootstrap tabs when document is ready
document.addEventListener('DOMContentLoaded', function() {
    // Ensure all tabs are properly initialized
    var tabLinks = document.querySelectorAll('#divisiTab a[data-toggle="tab"]');
    tabLinks.forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var targetId = this.getAttribute('href');
            // Hide all tab panes
            document.querySelectorAll('.tab-pane').forEach(function(pane) {
                pane.classList.remove('show', 'active');
            });
            // Remove active from all nav links
            document.querySelectorAll('#divisiTab .nav-link').forEach(function(nav) {
                nav.classList.remove('active');
                nav.setAttribute('aria-selected', 'false');
            });
            // Show selected tab pane
            var targetPane = document.querySelector(targetId);
            if (targetPane) {
                targetPane.classList.add('show', 'active');
                this.classList.add('active');
                this.setAttribute('aria-selected', 'true');
            }
        });
    });
});
</script>

<?= $this->endSection() ?>
