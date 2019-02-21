<div class="form-wrap">
    <div class="tab">
         <div class="tab-content" style="-moz-border-radius:7px;-webkit-border-radius:7px;border-radius:7px;">
                        <div class="tab-content-inner active" data-content="Alterar senha">
                        <form method="post"  action="{url}Inicio/alterar_senha/{id}" class="form-horizontal" >
                            <h3 style="color:#2c5093;">Alterar senha</h3>
                            <div class="form-group" style="display:{display};">
                                <div class="alert alert-danger"><b>{status}</b></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" required placeholder="Senha" id="senha" name="senha" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" required  placeholder="Confirmar senha"id="confsenha" name="confsenha" value="">
                                </div>
                            </div>
                        <input type="submit" class="btn btn-primary" value="Alterar senha">
                        </form>
    </div>
</div>

                    

