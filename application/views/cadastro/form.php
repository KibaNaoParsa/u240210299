<div class="row">
    <div class="col">
        <h1>Cadastro de Aluno</h1>
    </div>
</div>
<form method="POST" action="{url}Inicio/cadastro/{id_turma}/{email}/{sha1}" class="form-horizontal">
    <div class="form-group row">
        <label class="col-2 col-form-label col-form-label-lg">Nome Completo:</label>
        <div class="col-10">
            <input type="text" name="nome" class="form-control form-control-lg" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label col-form-label-lg">Senha:</label>
        <div class="col-10">
            <input type="password" name="senha" class="form-control form-control-lg" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-2 col-form-label col-form-label-lg">Confirmar Senha:</label>
        <div class="col-10">
            <input type="password" name="confirmar_senha" class="form-control form-control-lg" required>
        </div>
    </div>
    <input type="hidden" name="id_turma" class="form-control form-control-lg" value="{id_turma}" required>
    <div class="form-group row">
        <label class="col-2 col-form-label col-form-label-lg">Ano de entrada:</label>
        <div class="col-10">
            <input type="number" name="ano_entrada" class="form-control form-control-lg" required  min="2015">
        </div>
    </div>
    <button type="submit" class="btn btn-success">Enviar</button>
</form>
