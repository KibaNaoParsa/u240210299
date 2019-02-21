<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->helper(array("url", "form", "text"));
    }

    public function index() {
        $dados["url"] = base_url();
        $sessao = $this->session->userdata("id");
        if (empty($sessao)) {
            redirect("Inicio");
        } else {
            $sessao = $this->session->get_userdata();
            $dados["id"] = $sessao["id"];
            $dados["id_professor"] = $sessao["id"];
            $idProfessor["id_professor"] = $sessao["id"];
            $dados["nome_professor"] = $sessao["nome"];
            $dados["turmas"] = $this->Crud->gerenciador_turmas($idProfessor["id_professor"]);
            foreach ($dados["turmas"] as $key => $value) {
                $dados["turmas"][$key]["url"] = base_url();
            }
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["conteudo"] = $this->parser->parse("estagiario/turma/gerenciar_turmas", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        }
    }

}
