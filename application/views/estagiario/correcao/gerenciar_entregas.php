<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row">
    <div class="col">
        <h1><b>Gerenciamento de Entrega de Atividades</b></h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Turma: {nome_turma}</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Atividade: {nome_atividade}</h2>
    </div>
</div>

<div class="row" style="margin-bottom: 60px">
    <div class="alert alert-{cor} col" style="display:{display}"><h4><b>{msg}</b></h4></div>
</div>


<div class="row" style="margin-top: 30px">
    <div class="col">
        <table id="tabela" class="table table-bordered">
            <thead class="thead-dark">       
                <tr>
                    <th>Aluno</th>
                    <th>Situação</th>
                    <th>Data da Entrega</th>
                    <th>Correção</th>
                </tr>
            </thead>
            <tbody>
                {entregas}
                <tr>
                    <td>{nome}</td>
                    <td>{situacao}</td>
                    <td>{data_envio}</td>
                    <td>
                        <a class="btn btn-{cor} btn-block" href="{url}Estagiario/Correcao/{correcao_link}">{status}</a>
                    </td>
                </tr>
                {/entregas}
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
