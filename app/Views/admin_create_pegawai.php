<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('content') ?>

<style>
/* Fix dropdown text truncation - ensure full text is visible */
select.form-control {
    width: 100% !important;
    min-width: 100%;
    padding: 0.5rem 2.5rem 0.5rem 0.75rem !important;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
    background-size: 12px;
    text-overflow: '' !important;
    overflow: visible !important;
    white-space: nowrap !important;
}

select.form-control option {
    padding: 0.5rem;
    white-space: normal;
    word-wrap: break-word;
}

/* Ensure selected text is fully visible */
select.form-control:focus,
select.form-control:active,
select.form-control:hover {
    text-overflow: '' !important;
    overflow: visible !important;
}
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="font-family: 'Space Grotesk', sans-serif; font-weight: 600;">Tambah Pegawai</h2>
    <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Kembali</a>
</div>

<?php if (isset($validation) && ($validation->hasError('nama_pegawai') || $validation->hasError('jenis_kelamin') || $validation->hasError('tanggal_lahir') || $validation->hasError('divisi') || $validation->hasError('foto_pegawai'))): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php if ($validation->hasError('nama_pegawai')): ?>
                <li><?= $validation->getError('nama_pegawai') ?></li>
            <?php endif; ?>
            <?php if ($validation->hasError('jenis_kelamin')): ?>
                <li><?= $validation->getError('jenis_kelamin') ?></li>
            <?php endif; ?>
            <?php if ($validation->hasError('tanggal_lahir')): ?>
                <li><?= $validation->getError('tanggal_lahir') ?></li>
            <?php endif; ?>
            <?php if ($validation->hasError('divisi')): ?>
                <li><?= $validation->getError('divisi') ?></li>
            <?php endif; ?>
            <?php if ($validation->hasError('foto_pegawai')): ?>
                <li><?= $validation->getError('foto_pegawai') ?></li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif; ?>

<form action="" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    
    <div class="form-group">
        <label for="nama_pegawai">Nama Pegawai <span class="text-danger">*</span></label>
        <input type="text" 
               name="nama_pegawai" 
               id="nama_pegawai" 
               class="form-control <?= (isset($validation) && $validation->hasError('nama_pegawai')) ? 'is-invalid' : '' ?>" 
               placeholder="Masukkan nama pegawai" 
               value="<?= old('nama_pegawai') ?>" 
               required>
        <?php if (isset($validation) && $validation->hasError('nama_pegawai')): ?>
            <div class="invalid-feedback"><?= $validation->getError('nama_pegawai') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
        <select name="jenis_kelamin" 
                id="jenis_kelamin" 
                class="form-control <?= (isset($validation) && $validation->hasError('jenis_kelamin')) ? 'is-invalid' : '' ?>" 
                required>
            <option value="">Pilih Jenis Kelamin</option>
            <option value="laki-laki" <?= old('jenis_kelamin') === 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
            <option value="perempuan" <?= old('jenis_kelamin') === 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
        </select>
        <?php if (isset($validation) && $validation->hasError('jenis_kelamin')): ?>
            <div class="invalid-feedback"><?= $validation->getError('jenis_kelamin') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
        <input type="date"
               name="tanggal_lahir"
               id="tanggal_lahir"
               class="form-control <?= (isset($validation) && $validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>"
               value="<?= old('tanggal_lahir') ?>"
               required>
        <?php if (isset($validation) && $validation->hasError('tanggal_lahir')): ?>
            <div class="invalid-feedback"><?= $validation->getError('tanggal_lahir') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="divisi">Divisi <span class="text-danger">*</span></label>
        <select name="divisi" 
                id="divisi" 
                class="form-control <?= (isset($validation) && $validation->hasError('divisi')) ? 'is-invalid' : '' ?>" 
                required>
            <option value="">Pilih Divisi</option>
            <?php foreach ($divisiList as $divisi): ?>
                <option value="<?= $divisi ?>" <?= old('divisi') === $divisi ? 'selected' : '' ?>><?= $divisi ?></option>
            <?php endforeach; ?>
        </select>
        <?php if (isset($validation) && $validation->hasError('divisi')): ?>
            <div class="invalid-feedback"><?= $validation->getError('divisi') ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group">
        <label for="foto_pegawai">Foto Pegawai <span class="text-danger">*</span></label>
        <div class="custom-file">
            <input type="file" 
                   name="foto_pegawai" 
                   id="foto_pegawai" 
                   class="custom-file-input <?= (isset($validation) && $validation->hasError('foto_pegawai')) ? 'is-invalid' : '' ?>" 
                   accept="image/*" 
                   required>
            <label class="custom-file-label" for="foto_pegawai">Pilih file foto</label>
        </div>
        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
        <?php if (isset($validation) && $validation->hasError('foto_pegawai')): ?>
            <div class="invalid-feedback d-block"><?= $validation->getError('foto_pegawai') ?></div>
        <?php endif; ?>
        <div id="preview-container" class="mt-3" style="display: none;">
            <img id="preview-image" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('admin/pegawai') ?>" class="btn btn-secondary">Batal</a>
    </div>
</form>

<script>
// Preview image before upload
document.getElementById('foto_pegawai').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
            document.getElementById('preview-container').style.display = 'block';
        }
        reader.readAsDataURL(file);
    }
});

// Update file input label
document.getElementById('foto_pegawai').addEventListener('change', function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : 'Pilih file foto';
    e.target.nextElementSibling.textContent = fileName;
});
</script>

<?= $this->endSection() ?>

