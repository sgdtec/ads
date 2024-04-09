<?= $this->extend('Manager/Layout/master_main') ?>

<!-- title -->
<?= $this->section('title') ?>
<?= $title ?? '' ?>
<?= $this->endSection() ?>

<!-- styles -->
<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<!-- content -->
<?= $this->section('content') ?>

<div class="container-fluid">
    <h1 class="mt-4">Simple Sidebar</h1>    
</div>
<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>
<?= $this->endSection() ?>