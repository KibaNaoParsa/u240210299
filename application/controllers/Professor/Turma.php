<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller {

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
        $sessao = $this->session->userdata("id");
        if (empty($sessao)) {
            redirect("Inicio");
        } else {
            $sessao = $this->session->get_userdata();
            $dados["id"] = $sessao["id"];
            $dados["id_professor"] = $sessao["id"];
            $idProfessor["id_professor"] = $sessao["id"];
            $dados["nome_professor"] = $sessao["nome"];
            $dados["turmas"] = $this->Crud->select("turma", "*", $idProfessor);
            foreach ($dados["turmas"] as $key => $value) {
                $dados["turmas"][$key]["url"] = base_url();
            }
            $dados["url"] = base_url();
            $dados["modal"] = $dados["turmas"];
            $dados["conteudo"] = $this->parser->parse("professor/turma/gerenciar_turmas", $dados, TRUE);
            $dados["url"] = base_url();
            $this->layout->layout_professor($dados);
        }
    }

    public function add_turma($id) {
        $turma = $this->input->post();
        $this->form_validation->set_data($turma);
        $this->form_validation->set_rules("nome", "NOME", "required");
        $turma["id_professor"] = $id;
        if ($this->form_validation->run() != FALSE) {
            $tem = $this->Crud->select("turma", "nome", $turma);
            if (empty($tem[0])) {
                $this->Crud->insere("turma", $turma);
                $message["cor"] = "success";
                $message["msg"] = "Turma adicionada com sucesso!";
            } else {
                $message["cor"] = "danger";
                $message["msg"] = "Já existe uma turma com esse nome!";
            }
        } else {
            $message["msg"] = "Ecolha um nome para a turma!";
        }
        $message["display"] = "block";
        $this->layout->atualiza_dados($message);
        redirect("Professor/Turma");
    }

    public function deletar_turma($id = NULL) {
        $cond["id"] = $id;
        if ($this->Crud->select("turma", "*", $cond)) {
            if ($this->Crud->delete("turma", $cond)) {
                $message["msg"] = "Turma Deletada com Sucesso";
                $message["cor"] = "success";
            } else {
                $message["msg"] = "Erro ao deletar turma!";
                $message["cor"] = "danger";
            }
        } else {
            $message["msg"] = "Escolha uma turma que exista! (Essa mensagem pode aparacer após excluir uma turma e recarregar a página, nesse caso apenas ignore)";
            $message["cor"] = "warning";
        }
        $idp = $this->session->userdata("id");
        $message["display"] = "block";
        $this->layout->atualiza_dados($message);
        redirect("Professor/Turma");
    }

    public function editar_turma($id = NULL) {
        $idT["id"] = $id;
        $form = $this->input->post();
        if (empty($form)) {
            $dados["url"] = base_url();
            $dados["id"] = $id;
            $dados["voltar"] = base_url() . "Professor/Turma";
            $dados["nome"] = $this->Crud->select("turma", "nome", $idT)[0]["nome"];
            $dados["conteudo"] = $this->parser->parse("professor/turma/editar_turma", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else {
            if ($this->Crud->select("turma", "*", $idT)) {
                if ($this->Crud->update("turma", $form, $idT)) {
                    $message["msg"] = "Turma Editada com Sucesso";
                    $message["cor"] = "success";
                } else {
                    $message["msg"] = "Erro ao editar turma!";
                    $message["cor"] = "danger";
                }
            } else {
                $message["msg"] = "Escolha uma turma que exista! (Essa mensagem pode aparacer após excluir uma turma e recarregar a página, nesse caso apenas ignore)";
                $message["cor"] = "warning";
            }
            $message["display"] = "block";
            $this->layout->atualiza_dados($message);
            return redirect("Professor/Turma");
        }
    }

}
