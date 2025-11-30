<?= $this->extend('layout/post_layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <h2 class="h2 mb-3"><?= $news['title'] ?></h2>
        <div class="mb-4" style="color: var(--text-muted); font-size: 0.9rem;">
            <span>📅 <?= $news['created_at'] ?></span>
        </div>
        <div style="color: var(--text-secondary); line-height: 1.8;"><?= $news['content'] ?></div>
    </div>
</div>

<?= $this->endSection() ?>