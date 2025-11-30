<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<style>
.admin-pegawai-container {
    background: var(--card-bg, #ffffff);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: var(--shadow-md, 0 4px 16px rgba(0, 0, 0, 0.12));
}

.pegawai-card {
    transition: transform 0.2s, box-shadow 0.2s;
}

.pegawai-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg, 0 8px 32px rgba(0, 0, 0, 0.16));
}

.pegawai-photo {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 8px;
}

.pegawai-initial {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    font-size: 1.2rem;
}
</style>

<div class="admin-pegawai-container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="font-family: 'Space Grotesk', sans-serif; font-weight: 600; color: var(--text-primary, #1a1a1a);">Data Pegawai</h2>
        <a href="<?= base_url('admin/pegawai/new') ?>" class="btn btn-primary" style="font-weight: 500;">
            <span>+</span> Tambah Pegawai
        </a>
    </div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

    <!-- Filter by Divisi -->
    <div class="mb-4">
        <ul class="nav nav-pills" style="background: var(--bg-secondary, #f8f9fa); padding: 0.5rem; border-radius: 8px;">
            <li class="nav-item">
                <a class="nav-link <?= empty($currentDivisi) ? 'active' : '' ?>" 
                   href="<?= base_url('admin/pegawai') ?>"
                   style="border-radius: 6px; margin-right: 0.25rem;">
                    Semua
                </a>
            </li>
            <?php foreach ($divisiList as $divisi): ?>
            <li class="nav-item">
                <a class="nav-link <?= $currentDivisi === $divisi ? 'active' : '' ?>" 
                   href="<?= base_url('admin/pegawai?divisi=' . $divisi) ?>"
                   style="border-radius: 6px; margin-right: 0.25rem;">
                    <?= $divisi ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php if (empty($pegawai)): ?>
        <div class="alert alert-info text-center" style="border-radius: 8px;">
            <p class="mb-0" style="font-size: 1.1rem;">Belum ada data pegawai</p>
        </div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-hover" style="background: var(--card-bg, #ffffff); border-radius: 8px; overflow: hidden;">
                <thead style="background: var(--bg-tertiary, #f1f3f5);">
                    <tr>
                        <th style="font-weight: 600; padding: 1rem;">#</th>
                        <th style="font-weight: 600; padding: 1rem;">Foto</th>
                        <th style="font-weight: 600; padding: 1rem;">Nama Pegawai</th>
                        <th style="font-weight: 600; padding: 1rem;">Jenis Kelamin</th>
                        <th style="font-weight: 600; padding: 1rem;">Tanggal Lahir</th>
                        <th style="font-weight: 600; padding: 1rem;">Divisi</th>
                        <th style="font-weight: 600; padding: 1rem;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawai as $index => $p): ?>
                    <tr class="pegawai-card" style="border-bottom: 1px solid var(--border-color, rgba(0, 0, 0, 0.1));">
                        <td style="padding: 1rem; vertical-align: middle;"><?= $index + 1 ?></td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <?php if (!empty($p['foto_pegawai'])): ?>
                                <img src="<?= base_url('uploads/pegawai/' . $p['foto_pegawai']) ?>" 
                                     alt="<?= esc($p['nama_pegawai']) ?>" 
                                     class="pegawai-photo">
                            <?php else: ?>
                                <div class="pegawai-initial bg-secondary text-white">
                                    <?= strtoupper(substr($p['nama_pegawai'], 0, 1)) ?>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <strong style="color: var(--text-primary, #1a1a1a); font-size: 1rem;"><?= esc($p['nama_pegawai']) ?></strong>
                        </td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                <?php if ($p['jenis_kelamin'] === 'laki-laki'): ?>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                                        <path d="M9.5 11c1.38 0 2.5-1.12 2.5-2.5S10.88 6 9.5 6 7 7.12 7 8.5 8.12 11 9.5 11zm0 1C6.46 12 4 14.46 4 17.5V20h2v-2.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5V20h2v-2.5C15.5 14.46 13.04 12 9.5 12zm8.5-1c1.38 0 2.5-1.12 2.5-2.5S19.38 6 18 6s-2.5 1.12-2.5 2.5S16.62 11 18 11zm0 1c-3.04 0-5.5 2.46-5.5 5.5V20h2v-2.5c0-1.93 1.57-3.5 3.5-3.5s3.5 1.57 3.5 3.5V20h2v-2.5C23.5 14.46 21.04 12 18 12z"/>
                                    </svg>
                                    <span>Laki-laki</span>
                                <?php else: ?>
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="flex-shrink: 0;">
                                        <path d="M12 5.5c1.38 0 2.5-1.12 2.5-2.5S13.38.5 12 .5 9.5 1.62 9.5 3s1.12 2.5 2.5 2.5zm-5 0C8.38 5.5 9.5 4.38 9.5 3S8.38.5 7 .5 4.5 1.62 4.5 3 5.62 5.5 7 5.5zm10 0c1.38 0 2.5-1.12 2.5-2.5S18.38.5 17 .5 14.5 1.62 14.5 3s1.12 2.5 2.5 2.5zM12 7c-2.33 0-7 1.17-7 3.5V12h14v-1.5C19 8.17 14.33 7 12 7zm-5 4.5v3h-1v-3c0-.83.67-1.5 1.5-1.5S9 9.67 9 10.5v3H8v-3zm10 0v3h-1v-3c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v3h-1v-3z"/>
                                    </svg>
                                    <span>Perempuan</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <?php if (!empty($p['tanggal_lahir'])): ?>
                                <?= date('d M Y', strtotime($p['tanggal_lahir'])) ?>
                            <?php else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <span class="badge badge-primary" style="padding: 0.5rem 1rem; font-size: 0.875rem; border-radius: 6px;">
                                <?= esc($p['divisi']) ?>
                            </span>
                        </td>
                        <td style="padding: 1rem; vertical-align: middle;">
                            <div class="btn-group" role="group">
                                <a href="<?= base_url('admin/pegawai/' . $p['id_pegawai'] . '/edit') ?>" 
                                   class="btn btn-sm btn-outline-primary" 
                                   style="margin-right: 0.5rem; border-radius: 6px;">
                                    Edit
                                </a>
                                <button type="button"
                                        data-href="<?= base_url('admin/pegawai/' . $p['id_pegawai'] . '/delete') ?>" 
                                        onclick="confirmToDelete(this)" 
                                        class="btn btn-sm btn-outline-danger"
                                        style="border-radius: 6px;">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<div id="confirm-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="confirmDialogLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: var(--shadow-lg, 0 8px 32px rgba(0, 0, 0, 0.16));">
            <div class="modal-header" style="border-bottom: 1px solid var(--border-color, rgba(0, 0, 0, 0.1));">
                <h5 class="modal-title" id="confirmDialogLabel" style="font-family: 'Space Grotesk', sans-serif; font-weight: 600;">
                    Konfirmasi Hapus
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1.5rem;">
                <p style="font-size: 1rem; color: var(--text-secondary, #4a5568);">
                    Apakah Anda yakin ingin menghapus data pegawai ini?
                </p>
                <p style="font-size: 0.875rem; color: var(--text-muted, #718096); margin-bottom: 0;">
                    Data yang dihapus tidak dapat dikembalikan.
                </p>
            </div>
            <div class="modal-footer" style="border-top: 1px solid var(--border-color, rgba(0, 0, 0, 0.1));">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 6px; padding: 0.5rem 1.5rem;">
                    Batal
                </button>
                <a href="#" role="button" id="delete-button" class="btn btn-danger" style="border-radius: 6px; padding: 0.5rem 1.5rem;">
                    Hapus
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

