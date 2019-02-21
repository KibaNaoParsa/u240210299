<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Destaques extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->model("Crud", "c");
        $this->load->helper(array("url", "form", "text"));
        $aux = $this->session->userdata("id");
        if (empty($aux)) {
            redirect("");
        }
    }
    
    public function index(){
        $dados["url"] = base_url();
        $dados["destaques"] = $this->c->select("destaque", "*");
        foreach ($dados["destaques"] as $key => $value) {
            $dados["destaques"][$key]["url"] = base_url();
            $dados["destaques"][$key]["id_atividade"] = $this->c->select("atividade", "nome", "id=".$dados["destaques"][$key]["id_atividade"])[0]["nome"];
        }
        $dados["conteudo"] = $this->parser->parse("aluno/destaques/destaques", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    public function visualizar_destaque($id) {
        $dados= $this->c->select("destaque", "titulo, conteudo", "id =" . $id)[0];
        $dados["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("aluno/destaques/visualizar_destaque", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
}