<div class="box">
    <div class="box_interno"></div>
    <div class="margem">
        <form method="post" action="{url}Inserir/{id_atividade}/{bimestre}" class="form-horizontal" name="form_texto">
            {atividade}
            <h2>{nome}</h2>
            <div class="espaco"></div>
            {descricao}
            {/atividade}
            <div class="form-group">
                <label class="col-sm-2 control-label" for="nome">Titulo: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"   id="titulo" name="titulo" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" >Texto: </label>
                <div class="col-sm-10">
                    <textarea type="tinymce" style="class="form-control" id="conteudo" name="conteudo"></textarea>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="situacao" id="situacao" class="btn btn-primary btn-lg col-lg-2 to-the-right-lado" value="Em andamento">
                <input type="submit" name="situacao" id="situacao" class="btn btn-success btn-lg col-lg-2 to-the-right-lado" value="Enviar">
                <input type="submit" name="situacao" id="situacao" class="btn btn-dark btn-lg col-lg-2 to-the-right-lado" value="Visualizar">
            </div>
        </form>
    </div>
</div>
<script typr="text/javascript">
    tinymce.init({
        selector: "#conteudo"
    });
</script>
