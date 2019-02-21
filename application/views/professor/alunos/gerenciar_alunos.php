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
    <a class="btn btn-primary" href="{url}Professor/Aluno/adicionar_aluno"><i class="fas fa-plus"></i>  Adicionar Aluno</a>
</div>
<table id="tabela" class="table table-striped table-bordered" style="width:100%">
    <thead class="thead-dark">
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Ano_Entrada</th>
            <th>Editar</th>
            <th>Mudar de Turma</th>
            <th>Excluir</th>
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
            <td>
                <a class="btn btn-info btn-block" href="{url}Professor/Aluno/editar_aluno/{id}">
                    <i class="fas fa-edit fa-lg"></i>Editar
                </a>
            </td>
            <td>
                <a class="btn btn-warning btn-block" href="{url}Professor/Aluno/mudar_aluno/{id}">
                    Mudar de Turma
                </a>
            </td>
            <td>
                <button class="btn btn-danger btn-block"  data-toggle="modal" data-target="#{id}Modal" style="font-size: 24px" >
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        </tr>
        {/alunos}	
    </tbody>     
</table>

<div class="row justify-content-end" style="margin-top: 40px;">
    <a class="btn btn-primary"  href="{url}professor/adicionar_aluno"> <i class="fas fa-plus"></i>  Adicionar Aluno</a>
</div>

{modal}
<div class="modal fade" id="{id}Modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Aluno?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir este aluno? Com ele serão excluídas todas suas produções e notas!
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{url}Professor/Aluno/deletar_aluno/{id}">Sim</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>
{/modal}

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
