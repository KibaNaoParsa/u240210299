<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>

<div class="row">
    <div class="col">
        <h1>Visualizar Correção</h1>
    </div>
</div>

{atividade}
<div class="row">
    <div class="col">
        <h2>Atividade: {nome}</h2>
    </div>
</div>
{/atividade}

{aluno}
<div class="row">
    <div class="col">
        <h2>Aluno(a): {nome}</h2>
    </div>
</div>
{/aluno}


{texto_marcado}
<div class="row" style="margin-top: 30px">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Titulo</h5>
            </div>
            <div class="card-body">
                <p class="card-text"> {titulo} </p>
            </div>
        </div>
    </div>
</div>

<div class="row"  style="margin-top: 30px">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Conteudo</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{conteudo}</p>

            </div>
        </div>
    </div>
</div>
{/texto_marcado}

{correcao}
<div class="row"  style="margin-top: 30px">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Comentarios</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{comentarios}</p>

            </div>
        </div>
    </div>

</div>
</div>
{/correcao}
