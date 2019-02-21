<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Sistema de Redações</title>
        <script src="{url}assets/node_modules/jquery/dist/jquery.min.js"></script>
        <!-- Linkando Bootstrap -->
        <script src="{url}assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/bootstrap/css/bootstrap.css">

        <link rel="stylesheet" type="text/css" href="{url}assets/css/style_gerenciador.css">
        <!-- Linakando DataTables -->
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/DataTables/datatables.min.css"/>
        <script type="text/javascript" src="{url}assets/node_modules/DataTables/datatables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/fontawesome/web-fonts-with-css/css/fontawesome-all.css"/>
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
                            <a href="#" style="color:#fff; font-size:25px;font-family:'robotoblack';">Diggittus</a>
                        </div>
                        <div class="col-sm-8">
                            <ul>
                                <li>
                                    <a href="{url}Professor/Home">Inicio</a>
                                </li>
                                <li>
                                    <a href="{url}Professor/Exemplos">Exemplos Textuais</a>
                                </li>
                                <li>
                                    <a href="{url}Professor/Esquemas">Esquemas Textuais</a>
                                </li>
                                <li>
                                    <a href="{url}Professor/Turma">Turmas</a>
                                <li>
                                    <a href="{url}Professor/Correcao">Corrigir</a>
                                </li>
                                <li>
                                    <a href="{url}Professor/Atividade/notas">Notas</a>
                                </li>
                            </ul>
                        </div>
                        <div class="text-right col-sm-2">
                            <ul>
                                <li>
                                    <a href="{url}Professor/Home/perfil">Perfil</a>
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
        <div class="conatiner-fluid">
                    <div class="container rounded" style="background-color: whitesmoke; margin-top:60px; padding: 40px">
                        <div class="row" style="margin-bottom: 40px">
                            <div class="alert alert-{cor} col" style="display:{display}"><h4><b>{msg}</b></h4></div>
                        </div>
                        {conteudo}
                    
            </div>
        </div>
    </div>

</body>
</html>
