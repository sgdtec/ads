<script>
    $('#table_categories').DataTable({
        "order": [],
        "deferRender": true,
        "processing": true,
        "responsive": true,
        "language": {
            processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>'
        },
        ajax: '<?= route_to('categories.get.all') ?>',
        columns: [{
                data: 'name',
            },
            {
                data: 'slug',
            },
            {
                data: 'actions',
                className: ''
            }
        ],
        order: [
            [0, 'desc']
        ],
        language: {
            decimal: "",
            emptyTable: "Sem dados disponíveis na tabela.",
            info: "Mostrando _START_ até _END_ de _TOTAL_ registros",
            infoEmpty: "Mostrando 0 até 0 de 0 registos",
            infoFiltered: "(Filtrando _MAX_ total de registros)",
            infoPostFix: "",
            thousands: ",",
            lengthMenu: "Mostrando _MENU_ registros por página.",
            loadingRecords: "Carregando...",
            processing: "Processando...",
            search: "Filtrar:",
            zeroRecords: "Nenhum registro encontrado.",
            paginate: {
                first: "Primeira",
                last: "Última",
                next: "Próxima",
                previous: "Anterior"
            },
            aria: {
                sortAscending: ": ative para classificar a coluna em ordem crescente.",
                sortDescending: ": ative para classificar a coluna em ordem decrescente."
            }
        }
    });
</script>