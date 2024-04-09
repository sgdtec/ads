<!-- Modal -->
<div class="modal fade" id="categoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><strong>Nova Categoria</strong></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open(route_to('categories.create'), ['id' => 'categories-form'], ['id' => '']) ?>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" id="name">
                    <span class="text-danger error-text name"></span>
                </div>

                <div class="mb-3">
                    <label for="parent_id" class="form-label">Categoria Pai</label>
                    <!-- It will be filled in by javascript -->
                    <span id="boxParents"></span>
                    <span class="text-danger error-text parent_id"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-ban me-2"></i>Fechar</button>
                <button type="submit" class="btn btn-outline-success btn-sm"><i class="fa-solid fa-check me-2"></i>Salvar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>