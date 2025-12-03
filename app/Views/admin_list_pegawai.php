<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<style>
.admin-pegawai-container {
    background: var(--card-bg, #ffffff);
    border-radius: 16px;
    padding: 2rem;
    box-shadow: var(--shadow-md, 0 4px 16px rgba(0, 0, 0, 0.12));
}

.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.admin-header h2 {
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 700;
    color: var(--text-primary, #1a1a1a);
    margin: 0;
    font-size: 1.75rem;
}

.btn-add-pegawai {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #7f5bff 0%, #a855f7 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.btn-add-pegawai:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(127, 91, 255, 0.4);
    color: white;
    text-decoration: none;
}

.search-filter-box {
    background: linear-gradient(135deg, rgba(127, 91, 255, 0.05) 0%, rgba(168, 85, 247, 0.05) 100%);
    border: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
    border-radius: 16px;
    padding: 1.75rem;
    margin-bottom: 1.5rem;
}

.search-filter-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.25rem;
    font-family: 'Space Grotesk', sans-serif;
    font-weight: 600;
    font-size: 1.1rem;
    color: var(--text-primary, #1a1a1a);
}

.search-filter-title svg {
    color: #7f5bff;
}

.form-label-admin {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: 600;
    font-size: 0.875rem;
    color: var(--text-secondary, #4a5568);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.form-label-admin svg {
    flex-shrink: 0;
    opacity: 0.7;
}

.form-control-admin {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
    border-radius: 10px;
    font-size: 0.95rem;
    color: var(--text-primary, #1a1a1a);
    background: var(--card-bg, #ffffff);
    transition: all 0.2s ease;
    font-family: inherit;
}

.form-control-admin:focus {
    outline: none;
    border-color: #7f5bff;
    box-shadow: 0 0 0 4px rgba(127, 91, 255, 0.1);
}

.form-control-admin::placeholder {
    color: var(--text-muted, #9ca3af);
}

.filter-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-top: 1.25rem;
    flex-wrap: wrap;
}

.btn-search-admin {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 2rem;
    background: linear-gradient(135deg, #7f5bff 0%, #a855f7 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.btn-search-admin:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(127, 91, 255, 0.4);
}

.btn-reset-admin {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.875rem 1.5rem;
    background: white;
    color: var(--text-secondary, #4a5568);
    border: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
    border-radius: 10px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
}

.btn-reset-admin:hover {
    background: var(--bg-secondary, #f8f9fa);
    border-color: var(--text-muted, #9ca3af);
    color: var(--text-primary, #1a1a1a);
    text-decoration: none;
}

.result-badge {
    display: inline-flex;
    align-items: center;
    padding: 0.625rem 1.25rem;
    background: linear-gradient(135deg, rgba(127, 91, 255, 0.15) 0%, rgba(168, 85, 247, 0.15) 100%);
    color: #7f5bff;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 700;
    border: 2px solid rgba(127, 91, 255, 0.2);
}

.pegawai-table-wrapper {
    background: var(--card-bg, #ffffff);
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid var(--border-color, rgba(0, 0, 0, 0.1));
}

.pegawai-table {
    width: 100%;
    margin: 0;
}

.pegawai-table thead {
    background: linear-gradient(135deg, rgba(127, 91, 255, 0.08) 0%, rgba(168, 85, 247, 0.08) 100%);
}

.pegawai-table thead th {
    font-weight: 700;
    padding: 1.25rem 1rem;
    color: var(--text-primary, #1a1a1a);
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
    white-space: nowrap;
}

.pegawai-table tbody tr {
    border-bottom: 1px solid var(--border-color, rgba(0, 0, 0, 0.05));
    transition: all 0.2s ease;
}

.pegawai-table tbody tr:hover {
    background: rgba(127, 91, 255, 0.03);
}

.pegawai-table tbody td {
    padding: 1.25rem 1rem;
    vertical-align: middle;
    color: var(--text-secondary, #4a5568);
}

.pegawai-photo {
    width: 56px;
    height: 56px;
    object-fit: cover;
    border-radius: 10px;
    border: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
}

.pegawai-initial {
    width: 56px;
    height: 56px;
    border-radius: 10px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.25rem;
    background: linear-gradient(135deg, #7f5bff 0%, #a855f7 100%);
    color: white;
    border: 2px solid rgba(127, 91, 255, 0.2);
}

.pegawai-name {
    color: var(--text-primary, #1a1a1a);
    font-weight: 600;
    font-size: 1rem;
    word-wrap: break-word;
    overflow-wrap: break-word;
    max-width: 200px;
}

.gender-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    white-space: nowrap;
}

.divisi-badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: linear-gradient(135deg, #7f5bff 0%, #a855f7 100%);
    color: white;
    border-radius: 50px;
    font-size: 0.875rem;
    font-weight: 600;
    white-space: nowrap;
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: nowrap;
}

.btn-edit, .btn-delete {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.4rem;
    padding: 0.625rem 1.25rem;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.875rem;
    transition: all 0.2s ease;
    white-space: nowrap;
    text-decoration: none;
    border: 2px solid;
    cursor: pointer;
}

.btn-edit {
    color: var(--accent, #7f5bff);
    border-color: var(--accent, #7f5bff);
    background: rgba(127, 91, 255, 0.1);
}

.btn-edit:hover {
    background: linear-gradient(135deg, var(--accent) 0%, var(--accent-2) 100%);
    color: white;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(127, 91, 255, 0.3);
}

.btn-delete {
    color: #ef4444;
    border-color: #ef4444;
    background: rgba(239, 68, 68, 0.08);
}

.btn-delete:hover {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.btn-modal-cancel {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--bg-secondary, #f8f9fa);
    color: var(--text-secondary, #4a5568);
    border: 2px solid var(--border-color, rgba(0, 0, 0, 0.1));
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-modal-cancel:hover {
    background: var(--bg-tertiary, #f1f3f5);
    border-color: var(--text-muted, #9ca3af);
    color: var(--text-primary, #1a1a1a);
}

.btn-modal-delete {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    color: white;
    border: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 0.95rem;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.btn-modal-delete:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .admin-pegawai-container {
        padding: 1.5rem;
    }
    
    .search-filter-box {
        padding: 1.25rem;
    }
    
    .btn-search-admin, .btn-reset-admin {
        width: 100%;
        justify-content: center;
    }
    
    .result-badge {
        width: 100%;
        justify-content: center;
    }
    
    .pegawai-table thead th,
    .pegawai-table tbody td {
        padding: 0.75rem 0.5rem;
        font-size: 0.875rem;
    }
    
    .action-buttons {
        flex-direction: column;
    }
    
    .btn-edit, .btn-delete {
        width: 100%;
        text-align: center;
    }
    
    .modal-footer {
        flex-direction: column;
    }
    
    .btn-modal-cancel, .btn-modal-delete {
        width: 100%;
        justify-content: center;
    }
}
</style>

<div class="admin-pegawai-container">
    <div class="admin-header">
        <h2>Data Pegawai</h2>
        <a href="<?= base_url('admin/pegawai/new') ?>" class="btn-add-pegawai">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
            Tambah Pegawai
        </a>
    </div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 12px; border-left: 4px solid #10b981;">
        <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

    <!-- Search and Filter Form -->
    <div class="search-filter-box">
        <div class="search-filter-title">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <span>Pencarian & Filter Data</span>
        </div>
        <form method="get" action="<?= base_url('admin/pegawai') ?>" id="searchFilterForm">
            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <label for="search" class="form-label-admin">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <path d="m21 21-4.35-4.35"></path>
                        </svg>
                        Pencarian
                    </label>
                    <input type="text" 
                           class="form-control-admin" 
                           id="search" 
                           name="search" 
                           placeholder="Cari nama, divisi, jenis kelamin, tanggal lahir..." 
                           value="<?= esc($search) ?>">
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="divisi" class="form-label-admin">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="3" width="7" height="7"></rect>
                            <rect x="14" y="3" width="7" height="7"></rect>
                            <rect x="14" y="14" width="7" height="7"></rect>
                            <rect x="3" y="14" width="7" height="7"></rect>
                        </svg>
                        Divisi
                    </label>
                    <select class="form-control-admin" id="divisi" name="divisi">
                        <option value="">Semua Divisi</option>
                        <?php foreach ($divisiList as $divisi): ?>
                            <option value="<?= $divisi ?>" <?= $currentDivisi === $divisi ? 'selected' : '' ?>>
                                <?= $divisi ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <label for="jenis_kelamin" class="form-label-admin">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        Jenis Kelamin
                    </label>
                    <select class="form-control-admin" id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">Semua</option>
                        <option value="laki-laki" <?= $currentJenisKelamin === 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="perempuan" <?= $currentJenisKelamin === 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="filter-actions">
                <button type="submit" class="btn-search-admin">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.35-4.35"></path>
                    </svg>
                    Cari Data
                </button>
                <?php if (!empty($search) || !empty($currentDivisi) || !empty($currentJenisKelamin)): ?>
                    <a href="<?= base_url('admin/pegawai') ?>" class="btn-reset-admin">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="1 4 1 10 7 10"></polyline>
                            <polyline points="23 20 23 14 17 14"></polyline>
                            <path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path>
                        </svg>
                        Reset Filter
                    </a>
                    <span class="result-badge">
                        <?= count($pegawai) ?> hasil ditemukan
                    </span>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <?php if (empty($pegawai)): ?>
        <div class="alert alert-info text-center" style="border-radius: 12px; padding: 2rem; border-left: 4px solid #3b82f6;">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 1rem; opacity: 0.5;">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <p class="mb-0" style="font-size: 1.1rem; font-weight: 600;">Belum ada data pegawai</p>
            <p class="text-muted mb-0" style="font-size: 0.9rem;">Silakan tambahkan data pegawai baru</p>
        </div>
    <?php else: ?>
        <div class="pegawai-table-wrapper">
            <div class="table-responsive">
                <table class="pegawai-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama Pegawai</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Divisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pegawai as $index => $p): ?>
                        <tr>
                            <td><strong><?= $index + 1 ?></strong></td>
                            <td>
                                <?php if (!empty($p['foto_pegawai'])): ?>
                                    <img src="<?= base_url('uploads/pegawai/' . $p['foto_pegawai']) ?>" 
                                         alt="<?= esc($p['nama_pegawai']) ?>" 
                                         class="pegawai-photo">
                                <?php else: ?>
                                    <div class="pegawai-initial">
                                        <?= strtoupper(substr($p['nama_pegawai'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="pegawai-name"><?= esc($p['nama_pegawai']) ?></div>
                            </td>
                            <td>
                                <div class="gender-badge">
                                    <?php if ($p['jenis_kelamin'] === 'laki-laki'): ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #3b82f6;">
                                            <path d="M9.5 11c1.38 0 2.5-1.12 2.5-2.5S10.88 6 9.5 6 7 7.12 7 8.5 8.12 11 9.5 11zm0 1C6.46 12 4 14.46 4 17.5V20h2v-2.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5V20h2v-2.5C15.5 14.46 13.04 12 9.5 12z"/>
                                        </svg>
                                        <span>Laki-laki</span>
                                    <?php else: ?>
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="color: #ec4899;">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                                        </svg>
                                        <span>Perempuan</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <?php if (!empty($p['tanggal_lahir'])): ?>
                                    <?= date('d M Y', strtotime($p['tanggal_lahir'])) ?>
                                <?php else: ?>
                                    <span style="color: var(--text-muted, #9ca3af);">-</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="divisi-badge"><?= esc($p['divisi']) ?></span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="<?= base_url('admin/pegawai/' . $p['id_pegawai'] . '/edit') ?>" 
                                       class="btn-edit">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                        </svg>
                                        Edit
                                    </a>
                                    <button type="button"
                                            data-href="<?= base_url('admin/pegawai/' . $p['id_pegawai'] . '/delete') ?>" 
                                            onclick="confirmToDelete(this)" 
                                            class="btn-delete">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</div>

<div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: var(--shadow-lg, 0 8px 32px rgba(0, 0, 0, 0.16)); background: var(--card-bg, #ffffff);">
            <div class="modal-header" style="border-bottom: 2px solid var(--border-color, rgba(0, 0, 0, 0.1)); padding: 1.5rem;">
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <div style="width: 48px; height: 48px; border-radius: 12px; background: rgba(239, 68, 68, 0.1); display: flex; align-items: center; justify-content: center;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <h5 class="modal-title" id="confirmDialogLabel" style="font-family: 'Space Grotesk', sans-serif; font-weight: 700; color: var(--text-primary, #1a1a1a); margin: 0;">
                        Konfirmasi Hapus
                    </h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="opacity: 0.7;">
                    <span aria-hidden="true" style="font-size: 1.5rem;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1.75rem;">
                <p style="font-size: 1rem; color: var(--text-secondary, #4a5568); margin-bottom: 0.75rem; font-weight: 500;">
                    Apakah Anda yakin ingin menghapus data pegawai ini?
                </p>
                <p style="font-size: 0.875rem; color: var(--text-muted, #718096); margin-bottom: 0;">
                    ⚠️ Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>
            <div class="modal-footer" style="border-top: 2px solid var(--border-color, rgba(0, 0, 0, 0.1)); padding: 1.25rem 1.5rem; gap: 0.75rem;">
                <button type="button" class="btn-modal-cancel" data-dismiss="modal">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                    Batal
                </button>
                <a href="#" role="button" id="delete-button" class="btn-modal-delete">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                    </svg>
                    Ya, Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function confirmToDelete(el) {
    // Get the delete URL from data attribute
    var deleteUrl = el.getAttribute('data-href');
    
    // Set the href of delete button
    var deleteButton = document.getElementById('delete-button');
    if (deleteButton) {
        deleteButton.setAttribute('href', deleteUrl);
    }
    
    // Show modal using Bootstrap
    var modal = document.getElementById('confirm-dialog');
    if (modal) {
        // Use jQuery if available, otherwise use vanilla JS
        if (typeof $ !== 'undefined' && $.fn.modal) {
            $('#confirm-dialog').modal('show');
        } else {
            // Fallback to vanilla JS
            modal.style.display = 'block';
            modal.classList.add('show');
            document.body.classList.add('modal-open');
            
            // Handle delete button click
            deleteButton.onclick = function(e) {
                e.preventDefault();
                window.location.href = deleteUrl;
            };
            
            // Handle close button
            var closeButtons = modal.querySelectorAll('[data-dismiss="modal"], .close');
            closeButtons.forEach(function(btn) {
                btn.onclick = function() {
                    modal.style.display = 'none';
                    modal.classList.remove('show');
                    document.body.classList.remove('modal-open');
                };
            });
            
            // Close on backdrop click
            modal.onclick = function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                    modal.classList.remove('show');
                    document.body.classList.remove('modal-open');
                }
            };
        }
    }
}
</script>

<?= $this->endSection() ?>

