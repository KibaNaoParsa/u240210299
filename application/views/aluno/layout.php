<html>
    <head>
        <meta charset="utf-8">
        <title>Diggittus</title>
        <script src="{url}assets/node_modules/jquery/dist/jquery.min.js"></script>
        <script src="{url}assets/node_modules/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="{url}assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{url}assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="{url}assets/node_modules/DataTables/datatables.min.css"/>
        <script type="text/javascript" src="{url}assets/node_modules/DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="{url}assets/node_modules/tinymce/tinymce.min.js"></script>
    </head>
    <body>
        <div class="cor">
            <nav class="nav" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2 col-xs-12">
                            <a href="{url}Aluno" style="color:#fff; font-size:25px;font-family:'robotoblack';">Diggittus</a>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li>
                                    <a href="{url}Aluno">Inicio</a>
                                </li>
                                <li>
                                    <a href="{url}Atividades">Atividades</a>
                                <li>
                                    <a href="{url}Correcoes">Correções</a>
                                </li>
                                <li>
                                    <a href="{url}Exemplos">Exemplos</a>
                                </li>
                                <li>
                                    <a href="{url}Esquemas">Esquemas</a>
                                </li>
                                <li>
                                    <a href="{url}Destaques">Destaques</a>
                                </li>
                                <li>
                                    <a href="{url}Perfil">Perfil</a>
                                </li>
                                <li>
                                    <a href="{url}Logout">Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <header id="header" role="banner">
                <div class="espaco_padrao">
                    {conteudo}
                </div>
            </header>
        </div>
    </body>
</html>

