<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row">
    <div>
        <h1>Gerenciamento de Alunos</h1>
    </div>

</div>
<div class="row" style="margin-bottom: 40px">
    <h2>{nome_turma}</h2>
</div>

<div class="row justify-content-start" style="margin-bottom: 40px; margin-right: 60px">
    <a class="btn btn-primary" href="{url}Estagiario/Aluno/adicionar_aluno"><i class="fas fa-plus"></i>  Adicionar Aluno</a>
</div>
<table id="tabela" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ano_Entrada</th>
        </tr>
    </thead>
    <tbody>
        {alunos}
        <tr>
            <td>{nome}</td>
            <td>
                {email}
            </td>
            <td>
                {ano_entrada}
            </td>
        </tr>
        {/alunos}	
    </tbody>     
</table>

<div class="row justify-content-end" style="margin-top: 40px;">
    <a class="btn btn-primary"  href="{url}Estagiario/adicionar_aluno"> <i class="fas fa-plus"></i>  Adicionar Aluno</a>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tabela').DataTable({
            "oLanguage": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Mostrando _MENU_ resultados",
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
