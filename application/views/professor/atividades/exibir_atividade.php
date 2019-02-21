<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row" style="margin-top: 20px; margin-bottom: 20px">
    <div class="col">
        <div class="alert alert-{cor}" style="display: {display}">{msg}</div>
    </div>
</div>

<form class="text-right">
    <div class="form-group row">
        <label class="col-sm-2">Atividade:</label>
        <div class="col-sm-10">
            <input class="form-control" value="{nome}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Data de Entrega:</label>
        <div class="col-sm-10">
            <input class="form-control" value="{data_limite}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Gênero:</label>
        <div class="col-sm-10">
            <input class="form-control" value="{nome_genero}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Tipo Textual:</label>
        <div class="col-sm-10">
            <input class="form-control" value="{nome_tipo}" disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Descrição:</label>
        <div class="col-sm-10 text-left">
            <div class="card" style="padding: 5px">
            {descricao}
            </div>  

        </div>
    </div>
</form>


