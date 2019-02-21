<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Sistema de Redações</title>

        <!-- Linkando Bootstrap -->

        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/fontawesome/web-fonts-with-css/css/fontawesome-all.css"/>
        <link rel="stylesheet" type="text/css" href="{url}assets/css/style_gerenciador.css">
        <!-- Linakando DataTables -->
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/DataTables/datatables.min.css"/>
        <script src="{url}assets/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="{url}assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{url}assets/node_modules/DataTables/datatables.min.js"></script>

        <!-- Linakando TinyMce -->
        <script type="text/javascript" src="{url}assets/node_modules/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="{url}assets/node_modules/angular/angular.min.js"></script>

    </head>
    <body ng-app="">
        <div class="cor">
            <nav class="nav" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12">
                            <a href="{url}Aluno" style="color:#fff; font-size:25px;font-family:'robotoblack';">Diggittus</a>
                        </div>

                        <ul>
                            <li>
                                <a href="{url}Estagiario/Home">Inicio</a>
                            </li>
                            <li>
                                <a href="{url}Estagiario/Exemplos">Exemplos Textuais</a>
                            </li>
                            <li>
                                <a href="{url}Estagiario/Esquemas">Esquemas Textuais</a>
                            </li>
                            <li>
                                <a href="{url}Estagiario/Turma">Turmas</a>
                            <li>
                                <a href="{url}Estagiario/Correcao">Corrigir</a>
                            </li>
                            <li>
                                <a href="{url}Estagiario/Home/perfil">Perfil</a>
                            </li>
                            <li>
                                <a href="{url}Logout">Sair</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
    </nav>
</div>
<div class="container rounded" style="background-color: whitesmoke; margin-top:60px; padding: 40px">
    <div class="row" style="margin-bottom: 40px">
        <div class="alert alert-{cor} col" style="display:{display}"><h4><b>{msg}</b></h4></div>
    </div>
    {conteudo}
</div>
</body>
</html>
