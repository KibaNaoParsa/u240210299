<div class="form-wrap">
                                    <div class="tab">
                                        <ul class="tab-menu">
                                            <li class="active first"><a href="" data-tab="aluno">Aluno</a></li>
                                            <li class="second"><a href="" data-tab="professor">Gerenciador</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-content-inner active" data-content="aluno">
                                                <form method="post" action="{url}Inicio/login_aluno">
                                                    <div class="form-group" style="display:{msg};">
                                                        <div class="alert alert-{cor}"><b>{msg1}</b></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label><b>Email</b></label>
                                                            <input type="email" class="form-control" name="email_aluno" id="email_aluno" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Senha</label>
                                                            <input type="password" class="form-control" name="senha_aluno" id="senha_aluno" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary" value="Entrar">
                                                        </div>
                                                    </div>
                                                </form>	
                                            </div>
                                            <div class="tab-content-inner" data-content="professor">
                                                <form method="post" action="{url}Inicio/login_adm">
                                                    <div class="form-group" style="display:{msg};">
                                                        <div class="alert alert-{cor}"><b>{msg1}</b></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control" name="email_adm" id="email_adm" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Senha</label>
                                                            <input type="password" class="form-control" name="senha_adm" id="senha_adm" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-primary" value="Entrar">
                                                        </div>
                                                    </div>
                                                </form>	
                                            </div>
                                        </div>
                                    </div>
                                </div>