<div class="box">
    <div class="box_interno"></div>
    <div class="margem">
            <h2 style="color:#000447;" >Alterar senha</h2>
            <form method="post" action="{url}Senha" class="form-horizontal" name="form_senha">
            <div class="alert alert-danger" style="display:{display}" role="alert"><b>{status}</b></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size: 15px; color:#2c5093;">Atual: </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="senha" name="senha"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size: 15px; color:#2c5093;">Nova: </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="nova" name="nova"  required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" style="font-size: 15px; color:#2c5093;">Digite novamente: </label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="conf" name="conf" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <div class="col-sm-offset-0 col-sm-10">
                            <button type="submit" class="btn btn-primary col-lg-2 to-the-right-lado"  > Salvar</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-12">
                            &nbsp;
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
