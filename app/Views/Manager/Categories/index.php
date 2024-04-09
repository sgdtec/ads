<?= $this->extend('Manager/Layout/master_main') ?>
<?= $this->section('content') ?>

<div class="container-fluid pt-3">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><i class="fa-solid fa-list align-middle me-2"></i><strong><?= $title ?? '' ?></strong></h4>
                </div>               

                <div class="card-body">
                    <!-- Datatable -->
                    <table class="table table-striped table-bordered" id="table_categories">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Slug</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('partials/modal/modal_categories.php') ?>

<?= $this->endSection() ?>

<!-- scripts -->
<?= $this->section('scripts') ?>

<?= $this->include('Manager/Categories/Scripts/_datatable')?>
<?= $this->include('Manager/Categories/Scripts/_get_category_info')?>
<?= $this->include('Manager/Categories/Scripts/_submit_modal_create_update')?>

<script>
    function refreshCSRFToken(token) {
        $('[name="<?= csrf_token() ?>"]').val(token);
        $('meta[name="<?= csrf_token() ?>"]').attr('content', token);
    }
</script>
<?= $this->endSection() ?>