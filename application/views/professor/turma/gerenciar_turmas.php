
<div class="row">
    <h1><b>Gerenciamento de Turmas</b></h1>
</div>
<div class="row">
    <h2>Professor(a) {nome_professor}</h2>
</div>


<div class="row justify-content-start" style="margin-bottom: 40px;">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addTurmaModalCenter"><i class="fas fa-plus"></i>  Adicionar Turma</button>
</div>

<div class="modal fade" id="addTurmaModalCenter" tabindex="-1" role="dialog" aria-labelledby="addTurmaModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTurmaModalLongTitle" style="font-size: 40px"> Adicionar Turma </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-signin" method="post" action="{url}Professor/Turma/add_turma/{id_professor}">
                    <div class="form-group">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome da Turma!" style="font-size: 20px;" required>
                    </div>
                    <button class="btn btn-lg btn-block btn-success" type="submit">Adicionar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive-sm">
    <table id="tabela" class="table table-striped ">

        <thead class="thead-dark">
            <tr>
                <th>Turma</th>
                <th>Alunos</th>
                <th>Atividades</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            {turmas}
            <tr>
                <td>{nome}</td>
                <td>
                    <a class="btn btn-success btn-block" href="{url}Professor/Aluno/gerenciar_alunos/{id}">
                        <i class="fas fa-users fa-lg"></i> Gerenciar
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary btn-block"  href="{url}Professor/Atividade/index/{id}">
                        <i class="fas fa-list-alt fa-lg"></i> Gerenciar
                    </a>
                </td>
                <td>
                    <a class="btn btn-info btn-block"  href="{url}Professor/Turma/editar_turma/{id}" >
                        <i class="fas fa-edit fa-lg"></i> Editar
                    </a>
                </td>
                <td>
                    <button class="btn btn-danger btn-block"  data-toggle="modal" data-target="#{id}Modal" style="font-size: 24px" >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            {/turmas}
        </tbody>
    </table>
</div>

{modal}
<div class="modal fade" id="{id}Modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Excluir Turma?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que desja exlcuir essa Turma? Serão deletados juntamente com a turma os alunos pertencentes a ela, seus textos e notas!
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{url}Professor/Turma/deletar_turma/{id}">Sim</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
            </div>
        </div>
    </div>
</div>
{/modal}

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




