<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<h2 style="margin-bottom: 40px"> Editar {nome}</h2>

<form class="form" method="post" action="{url}Professor/Turma/editar_turma/{id}">
    <div class="form-group row">
        <label class="col-sm-1">Nome:</label>
        <div class="col-sm-11">
            <input type="text" id="nome" name="nome" class="form-control" value="{nome}" required>
        </div>
    </div>
    <div class="form-group row justify-content-end">
        <div class="col-sm-2 justify-items-end">
            <button class="btn btn-lg btn-success" type="submit">Editar</button>
        </div>
    </div>
</form>