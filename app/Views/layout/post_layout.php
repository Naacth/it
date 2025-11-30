<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Berita Codeigniter</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />
	
	<!-- Custom Theme CSS -->
	<link rel="stylesheet" href="<?= base_url('css/theme.css') ?>" />
</head>

<body>

    <?= $this->include('layout/navbar') ?>
    <?= $this->include('layout/header') ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?= $this->renderSection('content') ?>
            </div>
            <div class="col-md-4">
                <?= $this->include('layout/sidebar') ?>
            </div>
        </div>
    </div>

    <?= $this->include('layout/footer') ?>

	<!-- Theme Toggle Button -->
	<button class="theme-toggle" onclick="toggleTheme()" aria-label="Toggle theme">
		<svg class="icon-sun" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			<path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
		</svg>
		<svg class="icon-moon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
			<path d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10 10 0 01-9.696 6.46 10 10 0 01-6.46-9.696.75.75 0 01.98-.981zM17.25 16.5a.75.75 0 00.75-.75V8.25a.75.75 0 00-.75-.75h-8.5a.75.75 0 000 1.5h7.5v7.5a.75.75 0 00.75.75z"/>
		</svg>
	</button>

	<!-- Jquery dan Bootsrap JS -->
	<script src="<?= base_url('js/jquery.min.js') ?>"></script>
	<script src="<?= base_url('js/bootstrap.min.js') ?>"></script>
	
	<!-- Theme Toggle Script -->
	<script src="<?= base_url('js/theme-toggle.js') ?>"></script>

</body>

</html>