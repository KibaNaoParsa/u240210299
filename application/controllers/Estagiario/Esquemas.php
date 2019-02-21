<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esquemas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->library("layout");
        $this->load->helper(array("url", "form", "text"));
        $sessao = $this->session->userdata();
        if(!isset($sessao["id"]) || $sessao["tipo_usuario"] != 2){
            redirect(base_url()."Inicio");
        }
    }

    public function index() {
        $dados["url"] = base_url();
        $path = "download_esquemas/";
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
        $dados["display"] = "none";
        $dados["arquivos"] = $arquivos;
        $dados["conteudo"] = $this->parser->parse("professor/esquemas/listar_esquemas", $dados, TRUE);
        $this->parser->parse("estagiario/layout", $dados);
    }

}
