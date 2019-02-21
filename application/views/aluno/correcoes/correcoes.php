<div class="container espaco_padrao">
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">
                {active}
                <a class="list-group-item list-group-item-action {bim_1}" id="list-home-list" data-toggle="list" href="#list-b1" role="tab" aria-controls="home">1° Bimestre</a>
                <a class="list-group-item list-group-item-action {bim_2}" id="list-profile-list" data-toggle="list" href="#list-b2" role="tab" aria-controls="profile">2° Bimestre</a>
                <a class="list-group-item list-group-item-action {bim_3}" id="list-messages-list" data-toggle="list" href="#list-b3" role="tab" aria-controls="messages">3° Bimestre</a>
                <a class="list-group-item list-group-item-action {bim_4}" id="list-settings-list" data-toggle="list" href="#list-b4" role="tab" aria-controls="settings">4° Bimestre</a>
                {/active}
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                {show_active}
                <div class="tab-pane fade {show_1}" id="list-b1" role="tabpanel" aria-labelledby="list-home-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-{cor_1}  list-group-item-action active">
                            <h3>Correções 1º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_1}
                        <div class="alert alert-success" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_1}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Atividade</th>
                                    <th>Texto</th>
                                    <th>Nota</th>
                                    <th>Correção</th>
                                </tr>
                            </thead>
                            <tbody>
                                {1}
                                <tr>
                                    <td>
                                        {titulo}
                                    </td>
                                    <td>
                                        {nome_atividade}
                                    </td>
                                    <td>
                                        {visualizar}
                                    </td>
                                    <td>
                                        {nota}
                                    </td>
                                    <td>
                                        {comen}
                                    </td>
                                </tr>
                                {/1}
                            </tbody>
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_2}" id="list-b2" role="tabpanel" aria-labelledby="list-profile-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item  list-group-item-{cor_2} list-group-item-action active">
                            <h3>Correções 2º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_2}
                        <div class="alert alert-success" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_2}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Atividade</th>
                                    <th>Texto</th>
                                    <th>Nota</th>
                                    <th>Correção</th>
                                </tr>
                            </thead>
                            <tbody>
                                {2}
                                <tr>
                                    <td>
                                        {titulo}
                                    </td>
                                    <td>
                                        {nome_atividade}
                                    </td>
                                    <td>
                                        {visualizar}
                                    </td>
                                    <td>
                                        {nota}
                                    </td>
                                    <td>
                                        {comen}
                                    </td>
                                </tr>
                                {/2}
                            </tbody>
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_3}" id="list-b3" role="tabpanel" aria-labelledby="list-messages-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-{cor_3} list-group-item-action active">
                            <h3>Correções 3º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_3}
                        <div class="alert alert-success" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_3}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Atividade</th>
                                    <th>Texto</th>
                                    <th>Nota</th>
                                    <th>Correção</th>
                                </tr>
                            </thead>
                            <tbody>
                                {3}
                                <tr>
                                    <td>
                                        {titulo}
                                    </td>
                                    <td>
                                        {nome_atividade}
                                    </td>
                                    <td>
                                        {visualizar}
                                    </td>
                                    <td>
                                        {nota}
                                    </td>
                                    <td>
                                        {comen}
                                    </td>
                                </tr>
                                {/3}
                            </tbody>
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_4}" id="list-b4" role="tabpanel" aria-labelledby="list-settings-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-{cor_4}  list-group-item-action active">
                            <h3>Correções 4º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_4}
                        <div class="alert alert-success" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_4}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Atividade</th>
                                    <th>Texto</th>
                                    <th>Nota</th>
                                    <th>Correção</th>
                                </tr>
                            </thead>
                            <tbody>
                                {4}
                                <tr>
                                    <td>
                                        {titulo}
                                    </td>
                                    <td>
                                        {nome_atividade}
                                    </td>
                                    <td>
                                        {visualizar}
                                    </td>
                                    <td>
                                        {nota}
                                    </td>
                                    <td>
                                        {comen}
                                    </td>
                                </tr>
                                {/4}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
