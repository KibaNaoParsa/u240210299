<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>


<div class="row">
    <div class="col">
        <h2>Escolha um Bimestre e uma Atividade</h2>
    </div>
</div>


<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-b1" role="tab" aria-controls="home">Bimestre 1</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-b2" role="tab" aria-controls="profile">Bimestre 2</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-b3" role="tab" aria-controls="messages">Bimestre 3</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-b4" role="tab" aria-controls="settings">Bimestre 4</a>
        </div>
    </div>
    <div class="col-8">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-b1" role="tabpanel" aria-labelledby="list-home-list">
                <div class="list-group">
                    <a href="#" class="list-group-item   list-group-item-action active">
                        <h3>Atividades 1º Bimestre</h3> 
                    </a>
                    {1}
                    <a href="{url}Estagiario/Correcao/gerenciar_entregas/{id}/{id_turma}" class="list-group-item list-group-item-action">{nome}</a>
                    {/1}
                </div>
            </div>
            <div class="tab-pane fade" id="list-b2" role="tabpanel" aria-labelledby="list-profile-list">
                <div class="list-group">
                    <a href="#" class="list-group-item  list-group-item-action active">
                        <h3>Atividades 2º Bimestre</h3> 
                    </a>
                    {2}
                    <a href="{url}Estagiario/Correcao/gerenciar_entregas/{id}/{id_turma}" class="list-group-item list-group-item-action">{nome}</a>
                    {/2}
                </div>
            </div>
            <div class="tab-pane fade" id="list-b3" role="tabpanel" aria-labelledby="list-messages-list">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <h3>Atividades 3º Bimestre</h3> 
                    </a>
                    {3}
                    <a href="{url}Estagiario/Correcao/gerenciar_entregas/{id}/{id_turma}" class="list-group-item list-group-item-action">{nome}</a>
                    {/3}
                </div>
            </div>
            <div class="tab-pane fade" id="list-b4" role="tabpanel" aria-labelledby="list-settings-list">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">
                        <h3>Atividades 4º Bimestre</h3> 
                    </a>
                    {4}
                    <a href="{url}Estagiario/Correcao/gerenciar_entregas/{id}/{id_turma}" class="list-group-item list-group-item-action">{nome}</a>
                    {/4}
                </div>
            </div>
        </div>
    </div>
</div>