<?= $this->extend('layout/post_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <?php foreach ($newses as $news) : ?>
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="h5 mb-2"><a href="/news/<?= $news['slug'] ?>"><?= $news['title'] ?></a></h5>
                        <p class="mb-2"><?= substr($news['content'], 0, 120) ?>...</p>
                        <small style="color: var(--text-muted);">📅 <?= $news['created_at'] ?? '' ?></small>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?= $this->endSection() ?>