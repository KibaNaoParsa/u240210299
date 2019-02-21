
<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row">
    <h2><b>Gerenciamento de Atividades-{id_bimestre}º Bimestre</b></h2>
</div>
<div class="row">
    <h2>Turma: {nome}</h2>
</div>

<div class="row justify-content-start" style="margin-bottom: 40px;">
    <a class="btn btn-primary" href="{url}Professor/Atividade/adicionar_atividade/{id_turma}/{id_bimestre}"><i class="fas fa-plus"></i>  Adicionar atividade</a>
</div>



<div class="table-responsive-sm">
    <table id="tabela" class="table table-striped ">

        <thead class="thead-dark">
            <tr>
                <th>Atividade</th>
                <th>Exibir</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            {atividades}
            <tr>
                <td>{nome}</td>
                <td>
                    <a class="btn btn-dark btn-block" href="{url}Professor/Atividade/exibir_atividade/{id}/{id_turma}/{bimestre}">
                        <i class="fas fa-eye fa-lg"></i>   Exibir
                    </a>
                </td>
                <td>
                    <a class="btn btn-info btn-block"  href="{url}Professor/Atividade/editar_atividade/{id}/{id_turma}/{bimestre}" >
                         <i class="fas fa-edit fa-lg"></i> Editar
                    </a>
                </td>

                <td>
                    <button class="btn btn-danger btn-block"  data-toggle="modal" data-target="#{id}Modal" style="font-size: 24px" >
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            {/atividades}
        </tbody>
    </table>
</div> 

{modal}
<div class="modal fade" id="{id}Modal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo excluir a atividade "{nome}"? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Serão deletados juntamente com a atividade todos textos pertencentes a ela!
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" href="{url}Professor/Atividade/deletar_atividade/{id}/{id_turma}/{bimestre}">Sim</a>
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




