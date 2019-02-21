<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row" style="margin-top: 20px; margin-bottom: 20px">
    <div class="col">
        <div class="alert alert-{cor}" style="display: {display}">{msg}</div>
    </div>
</div>


<form name="formAddAtividade" method="POST" action="{url}Professor/Atividade/adicionar_atividade/{id_turma}/{bimestre}" class="text-right" >

    <input type="hidden" name="bimestre" value="{bimestre}" ng-model="bimestre" >
    <input type="hidden" name="id_turma" value="{id_turma}" ng-model="id_turma" >

    <div class="form-group row">
        <label class="col-sm-2 control-label label-lg">Nome:</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nome" name="nome" ng-model="nome" ng-required="true">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label">Descrição:</label>
        <div class="col-sm-10">
            <textarea  name="descricao" type="text" id="area" ng-model="descricao"></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label">Data Limite:</label>
        <div class="col-sm-10">
            <input type="date" id="data_limite" class="form-control"  name="data_limite" min="{min-date}" ng-required="true" ng-model="data_limite">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label">Gênero Textual:</label>
        <div class="col-sm-10">
            <select type="date" id="id_genero" class="form-control"  name="id_genero"  ng-required="true" ng-model="id_genero">
                {opt_genero}
                <option value="{id}">{nome}</option>
                {/opt_genero}
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 control-label">Tipo Textual:</label>
        <div class="col-sm-10">
            <select type="date" id="id_tipo" class="form-control"  name="id_tipo" ng-required="true" ng-model="id_tipo">
                {opt_tipo}
                <option value="{id}">{nome}</option>
                {/opt_tipo}
            </select>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-sm-2 control-label">Valor:</label>
        <div class="col-sm-10">
            <input type="number" step="0.1" id="valor" class="form-control" ng-required="true"  name="valor" ng-model="valor" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-12">
            <button type="submit" class="btn btn-success" ng-disabled="formAddAtividade.$invalid">Enviar</button>
        </div>
    </div>

</form>


<script type="text/javascript">
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
</script>