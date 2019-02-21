<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>


<form method="POST" action="{url}Professor/Aluno/adicionar_aluno/1" name="emailForm" class="form-horizontal">
    <label class="lg lg-label">Adicionar um aluno!</label>
    <div class="form-group ">
        <div class="col-12">
            <input type="email" name="email" placeholder="EMAIL DO ALUNO" ng-model="email" class="form-control" ng-required="true"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-12">
            <button type="submit" class="btn btn-success" ng-disabled="emailForm.$invalid">Enviar</button>
        </div>
    </div>
</form>