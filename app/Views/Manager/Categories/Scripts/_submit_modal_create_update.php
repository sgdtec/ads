<script>

    $('#categories-form').submit(function(e) {
        e.preventDefault();
        let form = this;
        $.ajax({
            url:$(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'JSON',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(response) {
                window.refreshCSRFToken(response.token);

                if(response.success == false) {
                    $.each(response.errors, function(field, value){
                        console.log(field);

                        $(form).find('span.' + field).text(value);
                    });

                    return;
                }
                // is ok
                // show message success
                $('#categoryModal').modal('hide');
                $(form)[0].reset();

                $('#table_categories').DataTable().ajax.reload(null, false);
                $('.modal-title').text('Nova Categoria');

                $(form).attr('action', '<?= route_to('categories.create')?>');
                $(form).find('input[name="id"]').val('');
                $(['name=_method']).remove();
            },
            error: function() {
                alert('Error backend');
            }
        });
    });
</script>