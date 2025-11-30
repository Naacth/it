<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="h3 mb-3">Hello <?= $name ?>!</h3>
                    <p class="mb-4">Silakan hubungi kami melalui form berikut</p>

                    <form action="" class="form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="nama@email.com">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Tulis pesan Anda di sini..."></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Kirim Pesan" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>