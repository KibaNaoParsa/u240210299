<div class="row justify-content-end">
    <a href="{voltar}" class="btn btn-warning"><i class="fas fa-arrow-alt-circle-left"></i> Voltar</a>
</div>
<div class="row">
    <div class="col">
        <h1>Notas </h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>Atividade: {nome} </h2>
    </div>
</div>
<div class="row">
    <div class="col">
        <h2>{bimestre}º Bimestre</h2>
    </div>
</div>
<div class="row">
    
</div>
<div class="row">
    <div class="col">
        <h2>Valor: {valor}</h2>
    </div>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr >
            <th>Aluno</th>
            <th>Nota</th>
        </tr>
    </thead>
    <tbody>
        {notas}
        <tr>
            <th>{nome}</th>
            <th>{nota}</th>
        </tr>
        {/notas}
    </tbody>
</table>
