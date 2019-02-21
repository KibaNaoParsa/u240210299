<style>
    label{
        font-size:18px;
        color:#000447;
    }
    .dataTables_info{
        color:#000447;
    }
</style>
<div class="box">
    <div class="box_interno"></div>
    <div class="margem">
        <h1 style="font-size:50px;">Exemplos</h1>
        <table id="tabela" class="table table-striped table-bordered" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>Gênero</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                {exemplos}
                <tr>
                    <td>
                        {id_genero}
                    </td>
                    <td>
                        <a href="{url}{caminho}" target="_blank" class="btn btn-success">Download</a>
                    </td>
                </tr>
                {/exemplos}
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#tabela').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrando _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').trigger('focus')
    })
</script>