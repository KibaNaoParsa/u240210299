<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'inicio';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Aluno - Home download

$route['Aluno'] = 'Alunos/Home';
$route['Download/(:any)'] = 'Alunos/Home/download/$1';
$route['Download/(:any)/(:any)'] = 'Alunos/Home/download/$1/$2';
$route['Logout'] = 'Alunos/Home/logout';

//Aluno - Atividades 

$route['Atividades'] = 'Alunos/Atividades/index';
$route['Atividades/(:any)'] = 'Alunos/Atividades/index/$1';
$route['Atividades/(:any)/(:any)'] = 'Alunos/Atividades/index/$1/$2';
$route['Escrever/(:any)'] = 'Alunos/Atividades/escrever/$1';
$route['Escrever/(:any)/(:any)'] = 'Alunos/Atividades/escrever/$1/$2';
$route['Continuar/(:any)'] = 'Alunos/Atividades/continuar/$1';
$route['Inserir/(:any)/(:any)'] = 'Alunos/Atividades/inserir/$1/$2';
$route['Editar/(:any)/(:any)/(:any)'] = 'Alunos/Atividades/editar/$1/$2/$3';
$route['Enviar/(:any)'] = 'Alunos/Atividades/enviar/$1';
$route['Arquivos/(:any)/(:any)/(:any)'] = 'Alunos/Atividades/arquivos/$1/$2/$3';

//Aluno - Correcoes 

$route['Correcoes'] = 'Alunos/Correcoes/index';
$route['Correcoes/(:any)'] = 'Alunos/Correcoes/index/$1';
$route['Correcoes/(:any)/(:any)'] = 'Alunos/Correcoes/index/$1/$2';
$route['Visualizar_texto/(:any)/(:any)/(:any)'] = 'Alunos/Correcoes/visualizar_texto/$1/$2/$3';
$route['Comentarios/(:any)'] = 'Alunos/Correcoes/comentarios/$1';

//Aluno - Exemplos
$route['Exemplos'] = 'Alunos/Exemplos/index';

//Aluno - Esquemas
$route['Esquemas'] = 'Alunos/Esquemas/index';

//Aluno - Destaques
$route['Destaques'] = 'Alunos/Destaques/index';
$route['Visualizar_destaque/(:any)'] = 'Alunos/Destaques/visualizar_destaque/$1';

//Aluno - Perfil 

$route['Perfil'] = 'Alunos/Perfil/index';
$route['Perfil/(:any)'] = 'Alunos/Perfil/index/$1';
$route['Senha'] = 'Alunos/Perfil/senha';
$route['Nome'] = 'Alunos/Perfil/nome';
