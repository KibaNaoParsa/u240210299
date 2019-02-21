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
                            <h3>Atividades 1º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_1}
                        <div class="alert alert-{cor}" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_1}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <tr class="thead-dark">
                                <th>Nome</th>
                                <th>Data limite</th>
                                <th>Valor</th>
                                <th>Exemplos</th>
                                <th>Esquema</th>
                                <th>Escrever</th>
                            </tr>
                            {1}
                            <tr>
                                <td>
                                    {nome}
                                </td>
                                <td>
                                    {data_limite}
                                </td>
                                <td>
                                    {valor}
                                </td>
                                <td>
                                    {exemplo}
                                </td>
                                <td>
                                    {esquema}
                                </td>
                                <td>
                                    {situacao}
                                </td>
                            </tr>
                            {/1}
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_2}" id="list-b2" role="tabpanel" aria-labelledby="list-profile-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item  list-group-item-{cor_2} list-group-item-action active">
                            <h3>Atividades 2º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_2}
                        <div class="alert alert-{cor}" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_2}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <tr class="thead-dark">
                                <th>Nome</th>
                                <th>Data limite</th>
                                <th>Valor</th>
                                <th>Exemplos</th>
                                <th>Esquema</th>
                                <th>Escrever</th>
                            </tr>
                            {2}
                            <tr>
                                <td>
                                    {nome}
                                </td>
                                <td>
                                    {data_limite}
                                </td>
                                <td>
                                    {valor}
                                </td>
                                <td>
                                    {exemplo}
                                </td>
                                <td>
                                    {esquema}
                                </td>
                                <td>
                                    {situacao}
                                </td>
                            </tr>
                            {/2}
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_3}" id="list-b3" role="tabpanel" aria-labelledby="list-messages-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-{cor_3} list-group-item-action active">
                            <h3>Atividades 3º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_3}
                        <div class="alert alert-{cor}" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_3}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <tr class="thead-dark">
                                <th>Nome</th>
                                <th>Data limite</th>
                                <th>Valor</th>
                                <th>Exemplos</th>
                                <th>Esquema</th>
                                <th>Escrever</th>
                            </tr>
                            {3}
                            <tr>
                                <td>
                                    {nome}
                                </td>
                                <td>
                                    {data_limite}
                                </td>
                                <td>
                                    {valor}
                                </td>
                                <td>
                                    {exemplo}
                                </td>
                                <td>
                                    {esquema}
                                </td>
                                <td>
                                    {situacao}
                                </td>
                            </tr>
                            {/3}
                        </table>
                    </div>
                </div>
                {show_active}
                <div class="tab-pane fade {show_4}" id="list-b4" role="tabpanel" aria-labelledby="list-settings-list">
                    {/show_active}
                    <div class="list-group">
                        <a href="#" class="list-group-item  list-group-item-{cor_4} list-group-item-action active">
                            <h3>Atividades 4º Bimestre</h3> 
                        </a>
                        <br>
                        {alerta_bim_4}
                        <div class="alert alert-{cor}" style="display:{display}" role="alert"><b>{status}</b></div>
                        {/alerta_bim_4}
                        <table id="tabela" class="table table-bordered" style="width:100%">
                            <tr class="thead-dark">
                                <th>Nome</th>
                                <th>Data limite</th>
                                <th>Valor</th>
                                <th>Exemplos</th>
                                <th>Esquema</th>
                                <th>Escrever</th>
                            </tr>
                            {4}
                            <tr>
                                <td>
                                    {nome}
                                </td>
                                <td>
                                    {data_limite}
                                </td>
                                <td>
                                    {valor}
                                </td>
                                <td>
                                    {exemplo}
                                </td>
                                <td>
                                    {esquema}
                                </td>
                                <td>
                                    {situacao}
                                </td>
                            </tr>
                            {/4}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_atrasado" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Atenção
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Já passou a data limite !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_enviado" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Atenção
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    Você já enviou um texto sobre essa atividade !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>                   