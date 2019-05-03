<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Exemplos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("layout");
        $sessao = $this->session->userdata();
        if(!isset($sessao["id"]) || $sessao["tipo_usuario"] != 1){
            redirect(base_url()."Inicio");
        }
    }

    public function index() {
        $dados["url"] = base_url();
        $path = "download_exemplos/";
        $diretorio = dir($path);
        $cont = 0;
        $arquivos = array();
        while ($arquivo = $diretorio->read()) {
            $nome = explode(".", $arquivo);
            if(!empty($nome[0]) && $nome[0]!=""){
              $arquivos[$cont]["download_url"] = base_url() . $path . $arquivo;
            $arquivos[$cont]["nome"]  = $nome[0];
            $cont++;   
            }
           
        }
        $diretorio->close();
        $dados["arquivos"] = $arquivos;
        $dados["conteudo"] = $this->parser->parse("professor/exemplos/listar_exemplos",$dados,TRUE);
        $this->layout->layout_professor($dados);
    }

}
