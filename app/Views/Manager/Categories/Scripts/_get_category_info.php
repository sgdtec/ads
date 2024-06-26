<script>

    $(document).on('click', '#updateCategoryBtn', function() {
        let id = $(this).data('id');
        let url = '<?= route_to('categories.get.info')?>';

        $.get(url, {
            id : id
        }, function(response) {
            $('#categoryModal').modal('show');
            $('.modal-title').text('Atualizar Categoria').addClass('bold');
            $('#categories-form').attr('action', '<?= route_to('categories.update') ?>');
            $('#categories-form').find('input[name="id"]').val(response.category.id);
            $('#categories-form').find('input[name="name"]').val(response.category.name);
            $('#categories-form').append("<input type='hidden' name='_method' value='PUT'>");
            $('#boxParents').html(response.parents);
            $('#categories-form').find('span.error-text').text('');
            
         }, 'json');
    });

</script>