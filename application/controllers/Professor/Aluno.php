<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("layout");
         $sessao = $this->session->userdata();
        if(!isset($sessao["id"]) || $sessao["tipo_usuario"] != 1){
            redirect(base_url()."Inicio");
        }
    }

    public function gerenciar_alunos($id = null) {
        $dados["url"] = base_url();
        if ($id == NULL || empty($this->session->userdata('id'))) {
            redirect("Professor/Home");
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
            $dados["voltar"] = base_url() . "Professor/Turma";
            $dados["conteudo"] = $this->parser->parse("professor/alunos/gerenciar_alunos", $dados, TRUE);
            $this->layout->layout_professor($dados);
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
            $dados["voltar"] = base_url() . "Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma");
            $dados["url"] = base_url();
            $dados["conteudo"] = $this->parser->parse("professor/alunos/adicionar_alunos", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else if ($tipo == 1) {
            $dados = $this->input->post();
            $this->form_validation->set_data($dados);
            $this->form_validation->set_rules("email", "EMAIL", "required");
            if (empty($dados["email"])) {
                $message["cor"] = "danger";
                $message["msg"] = "Informe um email!!!";
            } else {
                if ($this->enviar($dados["email"], $this->session->userdata("id_turma"))) {
                    $message["cor"] = "success";
                    $message["msg"] = "Aluno convidado com sucesso";
                } else {
                    $message["cor"] = "danger";
                    $message["msg"] = "Erro ao enviar convite!";
                }
            }

            $message["display"] = "block";
            $this->layout->atualiza_dados($message);
            redirect("Professor/Aluno/adicionar_aluno");
        }
    }

    public function deletar_aluno($id = NULL) {
        $sessao = $this->session->userdata("id");
        if (empty($sessao)) {
            redirect("Inicio");
        } else if ($id == NULL) {
            $message["msg"] = "Aluno inválido ou já excluido! (Esta mensagem pode aparecer após excluir um aluno e recarregar a página, caso isso ocorra apenas ignore).";
            $message["display"] = "block";
            $message["cor"] = "danger";
        } else {
            $idD["id"] = $id;
            $tem = $this->Crud->select("aluno", "*", $idD);
            if (!empty($tem[0])) {
                if ($this->Crud->delete("aluno", $idD)) {
                    $message["msg"] = "Aluno deletado com sucesso.";
                    $message["display"] = "block";
                    $message["cor"] = "success";
                } else {
                    $message["msg"] = "Erro ao deletar aluno!";
                    $message["display"] = "block";
                    $message["cor"] = "danger";
                }
            } else {
                $message["msg"] = "Aluno não existe ou já foi deletado!(Esta mensagem pode aparecer ao recarregar a página após deletar um aluno, nesse caso apenas ognore esta mensagem!)";
                $message["display"] = "block";
                $message["cor"] = "warning";
            }
        }
        $this->layout->atualiza_dados($message);
        return redirect("Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma"));
    }

    public function mudar_aluno($id = NULL) {
        $sessao = $this->session->userdata("id");
        $dados["url"] = base_url();
        $idAluno["id"] = $id;
        if (empty($sessao)) {
            redirect("Inicio");
        } else if ($id == NULL) {
            $message["msg"] = "Aluno inválido ou já excluido! (Esta mensagem pode aparecer após excluir um aluno e recarregar a página, caso isso ocorra apenas ignore).";
            $message["display"] = "block";
            $message["cor"] = "danger";
            $this->layout->atualiza_dados($message);
            return redirect("Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma"));
        } else {
            $muda = $this->input->post();
            if (empty($muda)) {
                $dados["id"] = $id;
                $dados["nome"] = $this->Crud->select("aluno", "nome", $idAluno)[0]["nome"];
                $dados["turmas"] = $this->Crud->select("turma");
                $dados["voltar"] = base_url() . "Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma");
                $dados["conteudo"] = $this->parser->parse("professor/alunos/mudar_turma", $dados, TRUE);
                return $this->layout->layout_professor($dados);
            } else {
                $this->form_validation->set_data($muda);
                $this->form_validation->set_rules("id_turma", "ID_TURMA", "required");
                if ($this->form_validation->run()) {
                    try {
                        $where["id"] = $id;
                        $this->Crud->update("aluno", $muda, $where);
                        $message["msg"] = "Aluno foi mudado de turma com sucesso!!";
                        $message["display"] = "block";
                        $message["cor"] = "success";
                    } catch (Exception $ex) {
                        $message["msg"] = "Erro ao mudar aluno!" . $ex;
                        $message["display"] = "block";
                        $message["cor"] = "danger";
                    }
                    $this->layout->atualiza_dados($message);
                    return redirect("Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma"));
                }
            }
        }
    }

    public function editar_aluno($id) {
        $sessao = $this->session->userdata("id");
        $dados["url"] = base_url();
        $idAluno["id"] = $id;
        if (empty($sessao)) {
            redirect("Inicio");
        } else if ($id == NULL) {
            $message["msg"] = "Aluno inválido!";
            $message["display"] = "block";
            $message["cor"] = "danger";
            return $this->layout->layout_professor($message);
        } else {
            $form = $this->input->post();
            if (empty($form)) {
                $dados["id"] = $id;
                $aluno = $this->Crud->select("aluno", "*", $idAluno)[0];
                $dados["nome"] = $aluno["nome"];
                $dados["email"] = $aluno["email"];
                $dados["ano_entrada"] = $aluno["ano_entrada"];
                $dados["voltar"] = base_url() . "Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma");
                $dados["conteudo"] = $this->parser->parse("professor/alunos/editar_aluno", $dados, TRUE);
                return $this->layout->layout_professor($dados);
            } else {
                $this->form_validation->set_data($form);
                $this->form_validation->set_rules("nome", "nome", "required");
                $this->form_validation->set_rules("email", "email", "required");
                $this->form_validation->set_rules("ano_entrada", "ano_entrada", "required");
                if ($this->form_validation->run()) {
                    try {
                        $where["id"] = $id;
                        $this->Crud->update("aluno", $form, $where);
                        $message["msg"] = "Aluno foi editado com sucesso!!";
                        $message["display"] = "block";
                        $message["cor"] = "success";
                        $this->layout->atualiza_dados($message);
                        return redirect("Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma"));
                    } catch (Exception $ex) {
                        $message["msg"] = "Erro ao editar aluno!" . $ex;
                        $message["display"] = "block";
                        $message["cor"] = "danger";
                        $this->layout->atualiza_dados($message);
                        return redirect("Professor/Aluno/gerenciar_alunos/" . $this->session->userdata("id_turma"));
                    }
                }
            }
        }
    }

}
