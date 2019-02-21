<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->model("Crud", "c");
        $this->load->library("session");
        $this->load->helper(array("url", "form", "text"));
        $aux = $this->session->userdata("id");
        if (empty($aux)) {
            redirect("");
        }
    }
    
    public function index($sit = NULL) {
        $dados["url"] = base_url();
        $info["aluno"] = $this->c->select("aluno", "*", "id = " . $this->session->userdata("id"));
        $info["aluno"][0]["id_turma"] = $this->c->select("turma", "nome", "id = " . $info["aluno"][0]["id_turma"])[0]["nome"];
        $info["aluno"][0]["url"] = base_url();
        if ($sit == NULL) {
            $info["aluno"][0]["display"] = "none";
            $info["aluno"][0]["status"] = "";
        } else if ($sit == 1) {
            $info["aluno"][0]["display"] = "block";
            $info["aluno"][0]["status"] = "Senha alterada com sucesso !";
        } else if ($sit == 2) {
            $info["aluno"][0]["display"] = "block";
            $info["aluno"][0]["status"] = "Nome alterado com sucesso !";
        }
        $dados["conteudo"] = $this->parser->parse("aluno/perfil/perfil", $info, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function senha() {
        $form = $this->input->post();
        $info["display"] = "none";
        $info["status"] = "";
        if (count($form) == 3) {
            if ($form["nova"] != $form["conf"]) {
                $info["display"] = "block";
                $info["status"] = "As senhas não correspondem!";
            } else {
                $senha = $this->c->select("aluno", "senha", "id =" . $this->session->userdata("id"))[0]["senha"];
                $confsenha["senha"] = sha1($form["senha"]);
                $confsenha2["senha"] = sha1($form["nova"]);
                if ($senha != $confsenha["senha"]) {
                    $info["display"] = "block";
                    $info["status"] = "Senha atual incorreta!";
                } else if ($this->c->update("aluno", $confsenha2, "id =" . $this->session->userdata("id"))) {
                    redirect(base_url() . "Perfil/1");
                } else {
                    $info["display"] = "block";
                    $info["status"] = "Erro ao alterar a senha!";
                }
            }
        }
        $dados["url"] = base_url();
        $info["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("aluno/perfil/senha", $info, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
}