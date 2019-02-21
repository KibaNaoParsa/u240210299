<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div> 

<h2>Escolha uma turma para mudar o aluno {nome}:</h2>

<form method="post" action="{url}Professor/Aluno/editar_aluno/{id}">

    <div class="form-group">
        <label class="col-2 col-form-label col-form-label-lg">Nome:</label>
        <div class="col-10">
            <input type="text" name="nome" class="form-control form-control-lg" required value="{nome}">
        </div>
    </div>


    <div class="form-group">
        <label class="col-2 col-form-label col-form-label-lg">Email:</label>
        <div class="col-10">
            <input type="text" name="email" class="form-control form-control-lg" required value="{email}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-2 col-form-label col-form-label-lg">Ano de entrada:</label>
        <div class="col-10">
            <input type="number" name="ano_entrada" class="form-control form-control-lg" required value="{ano_entrada}">
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-sm-4">
            <button class="btn btn-success btn-block" type="submit" > Enviar </button>
        </div>
    </div>

   

</form>

