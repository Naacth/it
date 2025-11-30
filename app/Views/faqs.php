<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($data_faqs as $faq) : ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h2 class="h2 mb-3"><?= $faq['question'] ?></h2>
                        <p class="mb-0"><?= $faq['answer'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>