<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row">
    <div class="col">
        <h1><b>Corrigir Atividade</b></h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Turma: {nome_turma}</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Atividade: {nome_atividade}</h2>
    </div>
</div>

<div class="row">
    <div class="col">
        <h2>Aluno: {nome}</h2>
    </div>
</div>


<form method="POST" action="{url}Professor/Correcao/enviar_correcao">
    <input type="hidden" name="id_professor" value="{idProfessor}">
    <input type="hidden" name="id_texto" value="{idTexto}">
      <div class="form-group">
        <label> <h4>Título:</h4></label>
        <input name="titulo" type="text" class="form-control" Readonly  value="{titulo}">
    </div>
    <div class="form-group">
        <label> <h4>Texto:</h4></label>
        <textarea name="texto_marcado" type="text" class="form-control" id="area">{conteudo}</textarea>
    </div>
    <div class="form-group row">
        <div class="col">
            <label> <h4>Comentário:</h4></label>
            <textarea name="comentarios" type="text" id="area2"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col">
            <label> <h4>Nota:</h4></label>
            <input name="nota" type="number" step="0.1" class="form-control" min="0.0" max="{max}">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-3">
            <input type="submit" class="btn btn-info btn-block" value="Salvar" name="enviar">
        </div>
        <div class="col-sm-3">
            <input type="submit" class="btn btn-success btn-block" value="Finalizar" name="enviar">
        </div>
    </div>


</form>

<script>
    tinymce.init({
        selector: "#area",
        relative_urls: false,
        remove_script_host: false,
        document_base_url: '{url}',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link charmap print',
            'searchreplace wordcount ',
            'insertdatetime save table contextmenu directionality',
            'emoticons paste textcolor colorpicker textpattern help'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: 'print| forecolor backcolor | emoticons',

    });
    tinymce.init({
        selector: "#area2",
        relative_urls: false,
        remove_script_host: false,
        document_base_url: '{url}',
        height: 500,
        theme: 'modern',
        plugins: [
            'advlist autolink lists link charmap print',
            'searchreplace wordcount ',
            'insertdatetime save table contextmenu directionality',
            'emoticons paste textcolor colorpicker textpattern help'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: 'print| forecolor backcolor | emoticons',

    });

    function selecionaAction(script) {
        document.actionJava.action = script;
        document.actionJava.submit();
    }
</script>