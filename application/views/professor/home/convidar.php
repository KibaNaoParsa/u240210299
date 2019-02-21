<div class='row'>
    <div class='col text-right'>
        <a href='{voltar}' class='btn btn-warning'>Voltar</a>
    </div>
</div>
<div class='row'>
    <div class='col'>
        <h1>Convidar {who}</h1>
    </div>
</div>

<form method='POST' action='{url}Professor/Home/{func}'>
    <div class='form-group'>
        <label>Email:</label>
        <input class='form-control' type='text' name='email'  required>
    </div>
    <div class='form-group text-right'>
        <button class='btn btn-success' type='post'>Convidar</button>
    </div>
</form>