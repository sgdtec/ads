<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="<?= env('APP_AUTHOR') ?>" />
    <meta name="<?= csrf_token() ?>" content="<?= csrf_hash() ?>" class="csrf" />
    <title><?= $this->renderSection('title') ?> <?= ' - ' . env('APP_NAME') ?></title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>images/favicon.ico" />

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/libs/bootstrap/bootstrap.min.css') ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="<?= base_url('asset/libs/fontawesome/all.min.css') ?>"> -->

    <!-- jquery -->
    <script src="<?= base_url('assets/libs/jquery/jquery.min.js') ?>"></script>

    <?php if (!empty($datatable)) : ?>
        <!-- DataTable css -->
        <link rel="stylesheet" href="<?= base_url('assets/libs/datatables/datatables.min.css') ?>">
    <?php endif ?>

    <!-- Core css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/core.css') ?>">

    <!-- css custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/custom.css') ?>">
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <?= $this->include('partials/side_bar.php') ?>

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">

            <!-- Top navigation-->
            <?= $this->include('partials/top_navigation.php') ?>

            <!-- content-->
            <?= $this->renderSection('content') ?>

        </div>
    </div>

    <!-- bootstrap js -->
    <script src="<?= base_url('assets/libs/bootstrap/bootstrap.bundle.min.js') ?>"></script>

    <?php if (!empty($datatable)) : ?>
        <!-- datatable -->
        <script src="<?= base_url('assets/libs/datatables/datatables.min.js') ?>"></script>
    <?php endif ?>

    <!-- Core theme JS-->
    <script src="<?= base_url('assets/') ?>js/scripts.js"></script>

    <?= $this->renderSection('scripts') ?>

</body>

</html>