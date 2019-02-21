<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->helper(array("url", "form", "text"));
    }

    public function gerenciar_alunos($id = null) {
        $dados["url"] = base_url();
        if ($id == NULL || empty($this->session->userdata('id'))) {
            redirect("Estagiario/Home");
        } else {
            $idT["id"] = $id;
            $idA["id_turma"] = $id;
            $sessao = $this->session->get_userdata();
            $dados["id"] = $sessao["id"];
            $idProfessor["id_professor"] = $sessao["id"];
            $dados["id_turma"] = $id;
            $sessao["id_turma"] = $id;
            $this->session->set_userdata($sessao);
            $dados["id_professor"] = $sessao["id"];
            $dados["alunos"] = $this->Crud->select("aluno", "*", $idA);
            foreach ($dados["alunos"] as $key => $value) {
                $dados["alunos"][$key]["url"] = base_url();
            }
            $dados["nome_turma"] = $this->Crud->select("turma", 'nome', $idT)[0]["nome"];
            $dados["modal"] = $dados["alunos"];
            $dados["display"] = "none";
            $dados["voltar"] = base_url() . "Estagiario/Turma";
            $dados["conteudo"] = $this->parser->parse("estagiario/alunos/gerenciar_alunos", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        }
    }

    public function enviar($to, $room) {
        $this->email->clear();
        $email_conf['protocol'] = 'smtp';
        $email_conf['smtp_host'] = 'ssl://smtp.gmail.com';
        $email_conf['smtp_port'] = '465';
        $email_conf['smtp_user'] = 'diggittus@gmail.com';
        $email_conf['smtp_pass'] = 'ghiDG2018';
        $email_conf['charset'] = 'utf-8';
        $email_conf['newline'] = "\r\n";
        $email_conf['mailtype'] = 'html'; // or html
        $email_conf['validation'] = TRUE;
        $this->email->initialize($email_conf);
        $this->email->from('diggittus@gmail.com', 'Diggittus');
        $this->email->to($to);
        $dados["link"] = base_url() . "Inicio/cadastro/" . $room . "/" . urlencode($to) . "/" . sha1(urlencode($to));
        $htmlMessage = $this->parser->parse("email", $dados, TRUE);
        $this->email->subject('Convite de Inscrição');
        $this->email->message($htmlMessage);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
            return false;
        }
    }

    public function adicionar_aluno($tipo = NULL) {
        $sessao = $this->session->userdata("id");
        if ($tipo == NULL) {
            $dados["id"] = $sessao;
            $dados["display"] = "none";
            $dados["voltar"] = base_url() . "Estagiario/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma");
            $dados["url"] = base_url();
            $dados["conteudo"] = $this->parser->parse("estagiario/alunos/adicionar_alunos", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        } else if ($tipo == 1) {
            $dados = $this->input->post();
            $this->form_validation->set_data($dados);
            $this->form_validation->set_rules("email", "EMAIL", "required");
            if (empty($dados["email"])) {
                $dados["cor"] = "danger";
                $dados["msg"] = "Informe um email!!!";
            } else {
                if ($this->enviar($dados["email"], $this->session->userdata("id_turma"))) {
                    $dados["cor"] = "success";
                    $dados["msg"] = "Aluno convidado com sucesso";
                } else {
                    $dados["cor"] = "danger";
                    $dados["msg"] = "Erro ao enviar convite!";
                }
            }

            $dados["display"] = "block";
            $dados["voltar"] = base_url() . "Estagiario/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma");
            $dados["url"] = base_url();
            $dados["conteudo"] = $this->parser->parse("estagiario/alunos/adicionar_alunos", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        }
    }

}
