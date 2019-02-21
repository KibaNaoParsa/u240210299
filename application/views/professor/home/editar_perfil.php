<div class="row">
    <div class="col">
        <h2>Editar Perfil:</h2>
    </div>
</div>

<form method="POST" action="{url}Professor/Home/editar_perfil">
    <div class="form-group">
        <label>Nome: </label>
        <input class="form-control" type="text" name="nome" value="{nome}" required>
    </div>
    <div class="form-group">
        <label>Email: </label>
        <input class="form-control" type="text" name="email" value="{email}" required>
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-info">Editar</button>
    </div>
</form>