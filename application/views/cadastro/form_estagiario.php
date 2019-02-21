<div class='row'>
    <div class='col'>
        <h1>Cadastro Estagiário</h1>
    </div>
</div>

<form method='POST' action='{url}Inicio/cadastro_estagiario'>
    
    <div class='form-group'>
        <label>Nome:</label>
        <input class='form-control' type='text' name='nome'  required>
    </div>
    <div class='form-group'>
        <label>Email:</label>
        <input class='form-control' type='email' name='email'  required>
    </div>
    <div class='form-group'>
        <label>Senha:</label>
        <input class='form-control' type='password' name='senha'  required>
    </div>
    <div class='form-group'>
        <label>Repita sua senha:</label>
        <input class='form-control' type='password' name='confirma_senha'  required>
    </div>
    <div class='form-group text-right'>
        <button class='btn btn-success' type='post'>Cadastrar</button>
    </div>
</form>