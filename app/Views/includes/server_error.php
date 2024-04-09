<?php if (!empty($server_error)) : ?>
    <div class="row">
        <div class="alert alert-danger p-2">
            <i class="fa-solid fa-triangle-exclamation me-2"></i>
            <?= $server_error ?>
        </div>
    </div>
<?php endif ?>