
<div class="row">
    <h1><b>Gerenciamento de Turmas</b></h1>
</div>
<div class="row">
    <h2>Estagiário(a) {nome_professor}</h2>
</div>

<div class="table-responsive-sm">
    <table id="tabela" class="table table-striped ">

        <thead class="thead-dark">
            <tr>
                <th>Turma</th>
                <th>Alunos</th>
            </tr>
        </thead>
        <tbody>
            {turmas}
            <tr>
                <td>{nome}</td>
                <td>
                    <a class="btn btn-success btn-block" href="{url}Estagiario/Aluno/gerenciar_alunos/{id}">
                        <i class="fas fa-users fa-lg"></i> Gerenciar
                    </a>
                </td>
            </tr>
            {/turmas}
        </tbody>
    </table>
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
</script>




