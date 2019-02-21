<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->library("layout");
        $this->load->helper(array("url", "form", "text"));
        $aux = $this->session->userdata("id");
        if (empty($aux)) {
            redirect("");
        }
    }
   
    public function index (){
        $dados["url"] = base_url();
        $dados["display"] = "none";
        $dados["conteudo"] = $this->parser->parse("estagiario/home/inicio_estagiario", $dados, TRUE);
        $this->parser->parse("estagiario/layout", $dados);
    }
    
    public function perfil() {
        $dados["url"] = base_url();
        $dados["display"] = "none";
        $dados["perfil"][0] = $this->session->userdata();
        $dados["conteudo"] = $this->parser->parse("estagiario/home/perfil", $dados, TRUE);
        $this->parser->parse("estagiario/layout", $dados);
    }

    public function editar_perfil() {
        $form = $this->input->post();
        if (empty($form)) {
            $dados["url"] = base_url();
            $dados["nome"] = $this->session->userdata("nome");
            $dados["email"] = $this->session->userdata("email");
            $dados["conteudo"] = $this->parser->parse("estagiario/home/editar_perfil", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else {
            $this->form_validation->set_data($form);
            $this->form_validation->set_rules("nome", "NOME", "required");
            $this->form_validation->set_rules("email", "EMAIL", "required");
            if ($this->form_validation->run()) {
                $where["id"] = $this->session->userdata("id");
                if ($this->Crud->update("professor", $form, $where)) {
                    $message["cor"] = "success";
                    $message["msg"] = "Seus dados foram salvos com sucesso!";
                    $message["display"] = "block";
                    $sessao = $this->Crud->select("professor", "nome,email", $where)[0];
                    $this->session->set_userdata($sessao);
                } else {
                    $message["cor"] = "danger";
                    $message["msg"] = "Erro no Banco de Dados, consulte um desenvolvedor!";
                    $message["display"] = "block";
                }
                $this->layout->atualiza_dados($message);
                return redirect(base_url()."Estagiario/Home/perfil"); 
            } else {
                $message["cor"] = "danger";
                $message["msg"] = "Preencha todos os campos!";
                $message["display"] = "block";
                $this->layout->atualiza_dados($message);
                return redirect(base_url . "Estagiario/Home/editar_perfil");
            }
        }
    }
    
}