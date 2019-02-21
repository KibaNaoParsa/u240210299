<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->tela();
    }

    public function tela($dados = array("msg" => "none", "msg1" => "")) {
        $dados["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("login", $dados, TRUE);
        $this->parser->parse("layout", $dados);
    }

    public function login_adm() {
        $dados = $this->input->post();
        $this->form_validation->set_data($dados);
        $this->form_validation->set_rules("email_adm", "EMAIL_ADM", "required");
        $this->form_validation->set_rules("senha_adm", "SENHA_ADM", "required");
        if ($this->form_validation->run() != FALSE) {
            $email["email"] = $dados["email_adm"];
            $usuario = $this->Crud->select("professor", "*", $email);
            if (!empty($usuario) && sha1($dados['senha_adm']) == $usuario[0]["senha"] && $usuario[0]["tipo_usuario"] == 1) {
                $this->session->set_userdata($usuario[0]);
                redirect("Professor/Home");
            } else if (!empty($usuario) && sha1($dados['senha_adm']) == $usuario[0]["senha"] && $usuario[0]["tipo_usuario"] == 2) {
                $this->session->set_userdata($usuario[0]);
                redirect("Estagiario/Home");
            } else {
                if (empty($usuario)) {
                    $retorno["msg1"] = "Email não cadastrado";
                    $retorno["msg"] = "danger";
                } else {
                    $retorno["msg1"] = "Senha Incorreta!";
                    $retorno["cor"] = "danger";
                }
                $retorno["msg"] = "block";
                $this->tela($retorno);
            }
        }
    }

    public function login_aluno() {
        $dados = $this->input->post();
        $this->form_validation->set_data($dados);
        $this->form_validation->set_rules("email_aluno", "EMAIL", "required");
        $this->form_validation->set_rules("senha_aluno", "SENHA", "required");
        if ($this->form_validation->run() != FALSE) {
            $email["email"] = $dados["email_aluno"];
            $resultado = $this->Crud->select("aluno", "*", $email);
            if (!empty($resultado) && sha1($dados['senha_aluno']) == $resultado[0]["senha"]) {
                $result = $this->Crud->select("aluno", "id, nome, email, id_turma, ano_entrada", $email);
                $this->session->set_userdata($result[0]);
                redirect("Aluno");
            } else {
                if (empty($resultado)) {
                    $retorno["msg1"] = "Email não cadastrado";
                    $retorno["cor"] = "danger";
                } else {
                    $retorno["msg1"] = '<a href="' . base_url() . 'Inicio/esqueci_senha"><strong style="color: #990000">Esqueceu a senha?</strong></a>';
                    $retorno["cor"] = "danger";
                }
                $retorno["msg"] = "block";
                $this->tela($retorno);
            }
        }
    }

    public function cadastro($turma = NULL, $email = NULL, $email_sha = NULL) {
        $e["email"] = urldecode($email);
        if ($turma != NULL && $email != NULL && $email_sha != NULL && sha1($email) == $email_sha) {
            $tem = $this->Crud->select("aluno", "*", $e);
            if (empty($tem)) {
                $insert = $this->input->post();
                if (!empty($insert)) {
                    $this->form_validation->set_data($insert);
                    $this->form_validation->set_rules("nome", "NOME", "required");
                    $this->form_validation->set_rules("senha", "SENHA", "required");
                    $this->form_validation->set_rules("confirmar_senha", "CONFIRMAR_SENHA", "required");
                    $this->form_validation->set_rules("id_turma", "TURMA", "required");
                    $this->form_validation->set_rules("ano_entrada", "ANO_ENTRADA", "required");
                    if ($this->form_validation->run() && $insert["senha"] == $insert["confirmar_senha"]) {
                        $user["nome"] = $insert["nome"];
                        $user["email"] = $e["email"];
                        $user["senha"] = sha1($insert["senha"]);
                        $user["ano_entrada"] = $insert["ano_entrada"];
                        $user["email"] = $e["email"];
                        $user["id_turma"] = $insert["id_turma"];
                        $this->Crud->insere("aluno", $user);
                        $dados["msg"] = "block";
                        $dados["msg1"] = "Cadastro realizado com sucesso!Você já pode logar!";
                        $dados["cor"] = "success";
                        return $this->tela($dados);
                    } else {
                        $dados["display"] = "block";
                        $dados["msg"] = "Preencha todos os campos!!";
                        $dados["cor"] = "danger";
                        $dados["url"] = base_url();
                        $dados["email"] = $email;
                        $dados["sha1"] = $email_sha;
                        $dados["id_turma"] = $turma;
                        $dados["conteudo"] = $this->parser->parse("cadastro", $dados, TRUE);
                        return $this->parser->parse("layout", $dados);
                    }
                } else {
                    $dados["display"] = "none";
                    $dados["url"] = base_url();
                    $dados["email"] = $email;
                    $dados["sha1"] = $email_sha;
                    $dados["id_turma"] = $turma;
                    $dados["conteudo"] = $this->parser->parse("cadastro/form", $dados, TRUE);
                    return $this->parser->parse("cadastro/layout", $dados);
                }
            } else {
                $dados["msg"] = "block";
                $dados["cor"] = "danger";
                $dados["msg1"] = "Aluno já cadastrado!";
                return $this->tela($dados);
            }
        } else {
            redirect("Inicio");
        }
    }

    public function esqueci_senha() {
        $form = $this->input->post();
        $dados["display"] = "none";
        $dados["status"] = "";
        if (count($form) == 1) {
            $email = $this->Crud->select("aluno", "id, email", $form);
            if (count($email) == 0) {
                $dados["display"] = "block";
                $dados["status"] = "E-mail não existe!";
            } else {
                $recupera["recupera"] = rand(100000, 999999);
                $this->enviar($email[0]["email"], $recupera["recupera"]);
                $this->Crud->update("aluno", $recupera, "id =" . $email[0]["id"]);
                redirect("Inicio/codigo/" . $email[0]["id"]);
            }
        }
        $dados["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("esqueci_senha", $dados, TRUE);
        $this->parser->parse("layout", $dados);
    }

    public function enviar($to, $recu) {
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
        $info["codigo"] = $recu;
        $htmlMessage = $this->parser->parse('recupera', $info, true);
        $this->email->subject('Recuperar senha');
        $this->email->message($htmlMessage);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
            return false;
        }
    }

    public function codigo($id) {
        $form = $this->input->post();
        $dados["url"] = base_url();
        $dados["display"] = "none";
        $dados["status"] = "";
        $dados["id"] = $id;
        if (count($form) == 1) {
            $codigo = $this->Crud->select("aluno", "recupera", "id =" . $id)[0]["recupera"];
            if ($codigo != 0) {
                if ($codigo != $form["codigo"]) {
                    $dados["display"] = "block";
                    $dados["status"] = "Codigo incorreta!";
                    $this->parser->parse("head", $dados);
                    $this->parser->parse("codigo", $dados);
                    $dados["conteudo"] = $this->parser->parse("esqueci_senha", $dados, TRUE);
                    $this->parser->parse("layout", $dados);
                } else {
                    $c["MMQY8df4B9muuQtd"] = $codigo;
                    $this->session->set_userdata($c);
                    $dados["conteudo"] = $this->parser->parse("senha", $dados, TRUE);
                    $this->parser->parse("layout", $dados);
                }
            } else {
                $dados["conteudo"] = $this->parser->parse("codigo", $dados, TRUE);
                $this->parser->parse("layout", $dados);
            }
        } else {
            $dados["conteudo"] = $this->parser->parse("codigo", $dados, TRUE);
            $this->parser->parse("layout", $dados);
        }
    }

    public function alterar_senha($id) {
        $form = $this->input->post();
        $dados["display"] = "none";
        $dados["status"] = "";
        $dados["url"] = base_url();
        $dados["id"] = $id;
        $dados["url"] = base_url();
        $codigo = $this->Crud->select("aluno", "recupera", "id =" . $id)[0]["recupera"];
        if ($this->session->userdata("MMQY8df4B9muuQtd") == $codigo) {
            if (count($form) == 2) {
                if ($form["senha"] != $form["confsenha"]) {
                    $dados["display"] = "block";
                    $dados["status"] = "Campos Senha e Repetir Senha diferentes!";
                    $dados["conteudo"] = $this->parser->parse("senha", $dados, TRUE);
                    $this->parser->parse("layout", $dados);
                } else {
                    $info["senha"] = sha1($form["senha"]);
                    $info["recupera"] = 0;
                    $this->Crud->update("aluno", $info, "id=" . $id);
                    redirect("");
                }
            } else {
                $dados["conteudo"] = $this->parser->parse("senha", $dados, TRUE);
                $this->parser->parse("layout", $dados);
            }
        }
    }
    
    public function cadastro_estagiario(){
       $form = $this->input->post();
        if(empty($form)){
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["conteudo"] = $this->parser->parse("cadastro/form_estagiario", $dados, TRUE);
            return $this->parser->parse("cadastro/layout", $dados);
        } else {
            $this->form_validation->set_data($form);
            $this->form_validation->set_rules("nome", "NOME", "required");
            $this->form_validation->set_rules("email", "EMAIL", "required");
            $this->form_validation->set_rules("senha", "SENHA", "required");
            $this->form_validation->set_rules("confirma_senha", "CONFIRMA_SENHA", "required");
            $where["email"] = $form["email"];
            $convidado = $this->Crud->select("convidados","*", $where);
            if ($this->form_validation->run() && $form["senha"] == $form["confirma_senha"] && !empty($convidado)) {
                $user["nome"] = $form["nome"];
                $user["senha"] = sha1($form["senha"]);
                $user["email"] = $form["email"];
                $user["tipo_usuario"] = '2';
                if($this->Crud->insere("professor", $user)){
                    $dados["msg"] = "block";
                    $dados["msg1"] = "Cadastro realizado com sucesso!Você já pode logar no sistema!";
                    $dados["cor"] = "success";
                    $where["email"] = $user["email"];
                    $this->Crud->delete("convidados", $where);
                } else {
                    $dados["msg"] = "block";
                    $dados["msg1"] = "Erro ao cadastrar! Consulte um desenvolvedor!";
                    $dados["cor"] = "danger";
                }
                return $this->tela($dados);
            } else {
                $dados["display"] = "block";
                $dados["msg"] = "Preencha todos os campos!!";
                $dados["cor"] = "danger";
                $dados["url"] = base_url();
                $dados["conteudo"] = $this->parser->parse("cadastro/form_estagiario", $dados, TRUE);
                return $this->parser->parse("cadastro/layout", $dados);
            }
        }
    }   
   
    public function cadastro_professor(){
        $form = $this->input->post();
        if(empty($form)){
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["conteudo"] = $this->parser->parse("cadastro/form_professor", $dados, TRUE);
            return $this->parser->parse("cadastro/layout", $dados);
        } else {
            $this->form_validation->set_data($form);
            $this->form_validation->set_rules("nome", "NOME", "required");
            $this->form_validation->set_rules("email", "EMAIL", "required");
            $this->form_validation->set_rules("senha", "SENHA", "required");
            $this->form_validation->set_rules("confirma_senha", "CONFIRMA_SENHA", "required");
            $where["email"] = $form["email"];
            $convidado = $this->Crud->select("convidados","*", $where);
            if ($this->form_validation->run() && $form["senha"] == $form["confirma_senha"] && !empty($convidado)) {
                $user["nome"] = $form["nome"];
                $user["senha"] = sha1($form["senha"]);
                $user["email"] = $form["email"];
                $user["tipo_usuario"] = '1';
                if($this->Crud->insere("professor", $user)){
                    $dados["msg"] = "block";
                    $dados["msg1"] = "Cadastro realizado com sucesso!Você já pode logar no sistema!";
                    $dados["cor"] = "success";
                    $where["email"] = $user["email"];
                    $this->Crud->delete("convidados", $where);
                } else {
                    $dados["msg"] = "block";
                    $dados["msg1"] = "Erro ao cadastrar! Consulte um desenvolvedor!";
                    $dados["cor"] = "danger";
                }
                return $this->tela($dados);
            } else {
                $dados["display"] = "block";
                $dados["msg"] = "Preencha todos os campos!!";
                $dados["cor"] = "danger";
                $dados["url"] = base_url();
                $dados["conteudo"] = $this->parser->parse("cadastro/form_professor", $dados, TRUE);
                return $this->parser->parse("cadastro/layout", $dados);
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect("inicio");
    }

}
