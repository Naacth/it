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

.btn-detail-pegawai {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.5rem 1rem;
    background: var(--card-bg);
    color: var(--accent);
    border: 2px solid var(--accent);
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.875rem;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-detail-pegawai:hover {
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.btn-detail-pegawai svg {
    flex-shrink: 0;
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

/* Search and Filter Styles */
.search-filter-card {
    background: var(--card-bg);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
}

.search-filter-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 600;
    font-size: 1.25rem;
    color: var(--text-primary);
}

.search-filter-header svg {
    color: var(--accent);
}

.form-label-custom {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 500;
    font-size: 0.9rem;
    color: var(--text-secondary);
    margin-bottom: 0.5rem;
}

.form-label-custom svg {
    flex-shrink: 0;
    opacity: 0.7;
}

.form-control-custom {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 0.95rem;
    color: var(--text-primary);
    background: var(--bg-primary);
    transition: all 0.2s ease;
    font-family: inherit;
}

.form-control-custom:focus {
    outline: none;
    border-color: var(--accent);
    box-shadow: 0 0 0 4px rgba(127, 91, 255, 0.1);
}

.form-control-custom::placeholder {
    color: var(--text-muted);
    opacity: 0.7;
}

.search-filter-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1.5rem;
    flex-wrap: wrap;
}

.btn-search {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 2rem;
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.btn-search:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(127, 91, 255, 0.4);
}

.btn-search:active {
    transform: translateY(0);
}

.btn-reset {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: var(--bg-secondary);
    color: var(--text-secondary);
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-weight: 500;
    font-size: 0.95rem;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-reset:hover {
    background: var(--bg-tertiary);
    color: var(--text-primary);
    text-decoration: none;
    border-color: var(--text-muted);
}

.filter-count {
    display: inline-flex;
    align-items: center;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, rgba(127, 91, 255, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
    color: var(--accent);
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
}

@media (max-width: 768px) {
    .pegawai-header h1 {
        font-size: 2rem;
    }
    
    .search-filter-card {
        padding: 1.5rem;
    }
    
    .search-filter-header {
        font-size: 1.1rem;
    }
    
    .btn-search, .btn-reset {
        width: 100%;
        justify-content: center;
    }
    
    .filter-count {
        width: 100%;
        justify-content: center;
    }
    
    .divisi-tabs .nav-pills .nav-link {
        padding: 0.5rem 1rem;
        font-size: 0.9rem;
    }
    
    .pegawai-avatar {
        width: 120px;
        height: 120px;
    }
    
    .pegawai-name {
        font-size: 1.15rem;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
}
</style>

<div class="container my-5 pegawai-page">
    <div class="pegawai-header">
        <h1>Data Pegawai</h1>
        <p>Daftar pegawai berdasarkan divisi</p>
    </div>

    <!-- Search and Filter Form -->
    <div class="search-filter-card mb-4">
        <div class="search-filter-header">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span>Pencarian & Filter</span>
        </div>
        <form method="get" action="<?= base_url('pegawai') ?>" id="searchFilterForm">
            <div class="row g-3">
                <div class="col-12 col-lg-8">
                    <label for="search" class="form-label-custom">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        Pencarian
                    </label>
                    <input type="text" 
                           class="form-control-custom" 
                           id="search" 
                           name="search" 
                           placeholder="Cari nama, divisi, jenis kelamin, tanggal lahir..." 
                           value="<?= esc($search) ?>">
                </div>
                <div class="col-12 col-lg-4">
                    <label for="jenis_kelamin" class="form-label-custom">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Jenis Kelamin
                    </label>
                    <select class="form-control-custom" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Semua</option>
                        <option value="laki-laki" <?= $jenisKelaminFilter === 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="perempuan" <?= $jenisKelaminFilter === 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="search-filter-actions">
                <button type="submit" class="btn-search">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    Cari
                </button>
                <?php if (!empty($search) || !empty($jenisKelaminFilter)): ?>
                    <a href="<?= base_url('pegawai') ?>" class="btn-reset">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <polyline points="23 20 23 14 17 14"></polyline>
                            <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                        </svg>
                        Reset
                    </a>
                    <span class="filter-count">
                        <?php 
                        $filterCount = 0;
                        if (!empty($search)) $filterCount++;
                        if (!empty($jenisKelaminFilter)) $filterCount++;
                        echo $filterCount . ' filter aktif';
                        ?>
                    </span>
                <?php endif; ?>
            </div>
        </form>
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
                                    <a href="<?= base_url('pegawai/' . $pegawai['id_pegawai']) ?>" class="btn-detail-pegawai">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg>
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
