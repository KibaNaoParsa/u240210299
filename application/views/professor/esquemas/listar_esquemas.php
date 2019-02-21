
<div class="row">
    <div class="col">
        <h1>Esquemas Textuais </h1>
    </div>
</div>

<!-- Nesse trecho, foi adicionado um botão para adicionar um exemplo à lista.

Próximos passos:

1. Fazer com que o usuário escolha um gênero já cadastrado (Provavelmente será necessário fazer uma aba para
a adição de gênero (OK))

2. Organizar todo o processo de adição ao BD (Controllers, etc)

3. Repetir o processo para esquemas

-->

<div class="row justify-content-start" style="margin-bottom: 10px;">
	<button class="btn btn-primary" data-toggle="modal" data-target="#addGeneroModalCenter"><i class="fas fa-plus"></i>  Adicionar Gênero</button>
</div>
		  
<div class="modal fade" id="addGeneroModalCenter" tabindex="-1" role="dialog" aria-labelledby="addGeneroModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
   	<div class="modal-content">
      	<div class="modal-header">
         	<h5 class="modal-title" id="addGeneroModalLongTitle" style="font-size: 40px"> Adicionar Gênero </h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               	<span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body">
         	<form class="form-signin" method="post" action="{url}Professor/Esquemas/add_genero/{id_genero}">
               	<input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do Gênero!" style="font-size: 20px;" required>
            	<div class="form-group">
               </div>
               <button class="btn btn-lg btn-block btn-success" type="submit">Adicionar</button>
            </form>
         </div>
      </div>
	</div>
</div>


<div class="row justify-content-start" style="margin-bottom: 40px;">
	<button class="btn btn-primary" data-toggle="modal" data-target="#addEsquemaModalCenter"><i class="fas fa-plus"></i>  Adicionar Esquema</button>
</div>
		  
<div class="modal fade" id="addEsquemaModalCenter" tabindex="-1" role="dialog" aria-labelledby="addEsquemaModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document" >
   	<div class="modal-content">
      	<div class="modal-header">
         	<h5 class="modal-title" id="addEsquemaModalLongTitle" style="font-size: 40px"> Adicionar Esquema </h5>
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
               	<span aria-hidden="true">&times;</span>
               </button>
         </div>
         <div class="modal-body">


         	<form class="form-signin" method="post" action="{url}Professor/Turma/add_turma/{id_professor}">
               	<input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do Esquema!" style="font-size: 20px;" required>
            	<div class="form-group">
               </div>
               <button class="btn btn-lg btn-block btn-success" type="submit">Adicionar</button>
            </form>



         </div>
      </div>
	</div>
</div>

<!-- Fim do trecho -->

<table class="table">
    <thead class="thead-dark">
        <tr >
            <th>Nome</th>
            <th>Baixar Esquema</th>
        </tr>
    </thead>
    <tbody>
        {arquivos}
        <tr>
            <th>{nome}</th>
            <th><a class="btn btn-warning btn-lgk" href="{download_url}" target="__blank" >Baixar Esquema</a></th>
        </tr>
        {/arquivos}
    </tbody>
</table>
