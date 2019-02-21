<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div> 

<h2>Escolha uma turma para mudar o(a) aluno(a) {nome}:</h2>

<form method="post" action="{url}Professor/Aluno/mudar_aluno/{id}">
    
    <div class="form-group row col-sm-12">
        <select name="id_turma" class="form-control" required>
            {turmas}
            <option value="{id}"> {nome}</option>
            {/turmas}
        </select>
    </div>
    
    
    <div class="form-group row">
        <div class="col-sm-3">
            <button class="btn btn-success btn-block" type="submit" > Enviar </button>
        </div>
    </div>
</form>
