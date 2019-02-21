<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Correcao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->library("layout");
        $this->load->helper(array("url", "form", "text"));
    }

    public function index() {
        $dados["url"] = base_url();
        $dados["display"] = "none";
        $dados["id"] = $this->session->userdata("id");
        $dados["turmas"] = $this->Crud->gerenciador_turmas($dados["id"]);
        foreach ($dados["turmas"] as $key => $value) {
            $dados["turmas"][$key]["url"] = base_url();
        }
        $dados["conteudo"] = $this->parser->parse("estagiario/correcao/escolher_turma", $dados, TRUE);
        $this->parser->parse("estagiario/layout", $dados);
    }

    public function escolher_atividade($id = NULL) {
        if ($id == NULL) {
            redirect("Estagiario/Home");
        } else {
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["id"] = $this->session->userdata("id");
            $where["id_turma"] = $id;
            $where["bimestre"] = 1;
            $dados["1"] = $this->Crud->select("atividade", "*", $where);
            $where["bimestre"] = 2;
            $dados["2"] = $this->Crud->select("atividade", "*", $where);
            $where["bimestre"] = 3;
            $dados["3"] = $this->Crud->select("atividade", "*", $where);
            $where["bimestre"] = 4;
            $dados["4"] = $this->Crud->select("atividade", "*", $where);
            foreach ($dados["1"] as $key => $value) {
                $dados["1"][$key]["url"] = base_url();
            }
            foreach ($dados["2"] as $key => $value) {
                $dados["2"][$key]["url"] = base_url();
            }
            foreach ($dados["3"] as $key => $value) {
                $dados["3"][$key]["url"] = base_url();
            }
            foreach ($dados["4"] as $key => $value) {
                $dados["4"][$key]["url"] = base_url();
            }
            $dados["voltar"] = base_url() . "Estagiario/Correcao/index";
            $dados["conteudo"] = $this->parser->parse("estagiario/correcao/escolher_atividade", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        }
    }

    public function gerenciar_entregas($id = NULL, $idTurma = NULL) {
        if ($id != NULL && $idTurma != NULL) {
            if (empty($vetor["display"])) {
                $dados["display"] = "none";
            } else {
                $dados = $vetor;
            }
            $dados["entregas"] = $this->Crud->aluno_as_texto_as_correcao($id, $idTurma);
            foreach ($dados["entregas"] as $key => $value) {
                $dados["entregas"][$key]["url"] = base_url();
                if (empty($dados["entregas"][$key]["situacao"])) {
                    $dados["entregas"][$key]["situacao"] = "Não Enviado!";
                    $dados["entregas"][$key]["data_envio"] = "Não Enviado!";
                    $dados["entregas"][$key]["status"] = "Indisponível";
                    $dados["entregas"][$key]["cor"] = "secondary";
                    $dados["entregas"][$key]["correcao_link"] = "#";
                    $dados["entregas"][$key]["url"] = "#";
                } else if (empty($dados["entregas"][$key]["status"])) {
                    $dados["entregas"][$key]["status"] = "Corrigir";
                    $dados["entregas"][$key]["cor"] = "primary";
                    $dados["entregas"][$key]["correcao_link"] = "corrigir_atividade/iniciar/" . $dados["entregas"][$key]["id"] . "/" . $id;
                } else if ($dados["entregas"][$key]["status"] == "Andamento") {
                    $dados["entregas"][$key]["status"] = "Continuar";
                    $dados["entregas"][$key]["cor"] = "warning";
                    $dados["entregas"][$key]["correcao_link"] = "corrigir_atividade/continuar/" . $dados["entregas"][$key]["id"] . "/" . $id;
                } else if ($dados["entregas"][$key]["status"] == "Finalizado") {
                    $dados["entregas"][$key]["status"] = "Finalizado";
                    $dados["entregas"][$key]["cor"] = "success";
                    $dados["entregas"][$key]["correcao_link"] = "ver_correcao/" . $dados["entregas"][$key]["id"] . "/" . $id;
                }
            }

            $where["id"] = $idTurma;
            $dados["nome_turma"] = $this->Crud->select("turma", "nome", $where)[0]["nome"];
            $where2["id_turma"] = $idTurma;
            $dados["nome_atividade"] = $this->Crud->select("atividade", "nome", $where2)[0]["nome"];
            $dados["url"] = base_url();
            $dados["voltar"] = base_url() . "Estagiario/Correcao/escolher_atividade/" . $idTurma;
            $dados["id"] = $this->session->userdata("id");
            $dados["conteudo"] = $this->parser->parse("estagiario/correcao/gerenciar_entregas", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        }
    }

    public function corrigir_atividade($tipo = NULL, $idTexto = NULL, $idAtividade = NULL, $vetor = array()) {
        if ($tipo != NULL && $idTexto != NULL && $idAtividade != NULL) {
            if ($tipo == "iniciar") {
                $view = "estagiario/correcao/iniciar_correcao";
                $dados = $this->Crud->texto_as_atividade_as_aluno($idTexto)[0];
                $dados["id_correcao"] = ' ';
            } else if ($tipo == "continuar") {
                $view = "estagiario/correcao/continuar_correcao";
                $dados = $this->Crud->select("texto_marcado", "titulo, conteudo", "id_texto=" . $idTexto)[0];
                $texto["id_texto"] = $idTexto;
                $dados["comentarios"] = $this->Crud->select("correcao", "comentarios", $texto)[0]["comentarios"];
                $dados["nota"] = $this->Crud->select("correcao", "nota", $texto)[0]["nota"];
                $idAluno["id"] = $this->Crud->select("texto", "id_aluno", "id=" . $idTexto)[0]["id_aluno"];
                $dados["nome"] = $this->Crud->select("aluno", "nome", $idAluno)[0]["nome"];
                $idCorrecao = $this->Crud->select("correcao", "id", $texto);
                $dados["id_correcao"] = $idCorrecao[0]["id"];
            } else if ($tipo == "finalizado") {
                $view = "estagiario/correcao/correcao_finalizada";
            }
            $dados["idProfessor"] = $this->session->userdata("id");
            $dados["idTexto"] = $idTexto;
            $where["id"] = $idAtividade;
            $idTurma = $this->Crud->select("atividade", "id_turma", $where)[0]["id_turma"];
            $where["id"] = $idAtividade;
            $dados["nome_atividade"] = $this->Crud->select("atividade", "nome", $where)[0]["nome"];
            $where["id"] = $idTurma;
            $dados["nome_turma"] = $this->Crud->select("turma", "nome", $where)[0]["nome"];
            $dados["url"] = base_url();
            $dados["voltar"] = base_url() . "Estagiario/Correcao/gerenciar_entregas/" . $idAtividade . "/" . $idTurma;
            $dados["id"] = $this->session->userdata("id");
            $dados["display"] = "none";
            $dados["conteudo"] = $this->parser->parse($view, $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        } else {
            redirect("Estagiario/Home");
        }
    }

    public function enviar_correcao() {
        $form = $this->input->post();
        $this->form_validation->set_data($form);
        $this->form_validation->set_rules("id_professor", "ID_PROFESSOR", "required");
        $this->form_validation->set_rules("id_texto", "ID_TEXTO", "required");
        if ($this->form_validation->run()) {
            if ($form["enviar"] == "Salvar") {
                $correcao["status"] = "Andamento";
            } else if ($form["enviar"] == "Finalizar") {
                $correcao["status"] = "Finalizado";
            }
            if (empty($form["nota"])) {
                $correcao["nota"] = 0.0;
            } else {
                $correcao["nota"] = $form["nota"];
            }
            $correcao["id_professor"] = $form["id_professor"];
            $correcao["id_texto"] = $form["id_texto"];
            $correcao["comentarios"] = $form["comentarios"];
            $texto["id_texto"] = $form["id_texto"];
            $texto["titulo"] = $form["titulo"];
            $texto["conteudo"] = $form["texto_marcado"];

            $where["id"] = $form["id_texto"];
            $idAtividade = $this->Crud->select("texto", "id_atividade", $where)[0]['id_atividade'];
            $where["id"] = $this->Crud->select("texto", "id_aluno", $where)[0]["id_aluno"];
            $idTurma = $this->Crud->select("aluno", "id_turma", $where)[0]["id_turma"];

            $where = array();
            $where["id_texto"] = $form["id_texto"];
            $tem = $this->Crud->select("correcao", "*", $where);

            if (empty($tem)) {
                if ($this->Crud->insere("correcao", $correcao)) {
                    if ($this->Crud->insere("texto_marcado", $texto)) {
                        $message["display"] = "block";
                        $message["msg"] = "Correcao Salva com sucesso!";
                        $message['cor'] = "success";
                    } else {
                        $message["display"] = "block";
                        $message["msg"] = "Erro no banco de dados, consulte um desenvolvedor!";
                        $message['cor'] = "danger";
                    }
                } else {
                    $message["display"] = "block";
                    $message["msg"] = "Erro no banco de dados, consulte um desenvolvedor!";
                    $message['cor'] = "danger";
                }
                $this->layout->atualiza_dados($message);
                return redirect("Estagiario/Correcao/gerenciar_entregas/" . $idAtividade . "/" . $idTurma);
                ;
            } else {
                return redirect("Estagiario/Correcao/gerenciar_entregas/" . $idAtividade . "/" . $idTurma);
            }
        }
        redirect("Estagiario/Home");
    }

    public function atualizar_correcao() {
        $form = $this->input->post();
        $this->form_validation->set_data($form);
        $this->form_validation->set_rules("id_professor", "ID_PROFESSOR", "required");
        $this->form_validation->set_rules("id_texto", "ID_TEXTO", "required");
        if ($this->form_validation->run()) {
            if ($form["enviar"] == "Salvar") {
                $correcao["status"] = "Andamento";
            } else if ($form["enviar"] == "Finalizar") {
                $correcao["status"] = "Finalizado";
            }
            if (empty($form["nota"])) {
                $correcao["nota"] = 0.0;
            } else {
                $correcao["nota"] = $form["nota"];
            }
            $correcao["id_professor"] = $form["id_professor"];
            $correcao["id_texto"] = $form["id_texto"];
            $correcao["comentarios"] = $form["comentarios"];
            $texto["id_texto"] = $form["id_texto"];
            $texto["titulo"] = $form["titulo"];
            $texto["conteudo"] = $form["texto_marcado"];

            $where["id"] = $form["id_texto"];
            $idAtividade = $this->Crud->select("texto", "id_atividade", $where)[0]['id_atividade'];
            $where["id"] = $this->Crud->select("texto", "id_aluno", $where)[0]["id_aluno"];
            $idTurma = $this->Crud->select("aluno", "id_turma", $where)[0]["id_turma"];

            $where = array();
            $where["id_texto"] = $form["id_texto"];
            $tem = $this->Crud->select("correcao", "*", $where);



            if ($this->Crud->update("correcao", $correcao, $where)) {
                if ($this->Crud->update("texto_marcado", $texto, $where)) {
                    $message["display"] = "block";
                    $message["msg"] = "Correcao Salva com sucesso!";
                    $message['cor'] = "success";
                } else {
                    $message["display"] = "block";
                    $message["msg"] = "Erro no banco de dados, consulte um desenvolvedor!";
                    $message['cor'] = "danger";
                }
            } else {
                $message["display"] = "block";
                $message["msg"] = "Erro no banco de dados, consulte um desenvolvedor!";
                $message['cor'] = "danger";
            }
            $this->layout->atualiza_dados($message);
            return redirect("Estagiario/Correcao/gerenciar_entregas/" . $idAtividade . "/" . $idTurma);
            ;
        }
    }

    public function ver_correcao($id_texto = NULL, $id_atividade = NULL, $id_turma = NULL) {
        if ($id_texto != NULL && $id_atividade != NULL) {
            $where_texto["id_texto"] = $id_texto;
            $where_atividade["id"] = $id_atividade;
            $where_aluno["id"] = $this->Crud->select("texto", "id_aluno", "id=".$id_texto)[0]["id_aluno"];
            $dados["aluno"] = $this->Crud->select("aluno", "nome", $where_aluno);
            $dados["atividade"] = $this->Crud->select("atividade", "*", $where_atividade);
            $dados["texto_marcado"] = $this->Crud->select("texto_marcado", "*", $where_texto);
            $dados["correcao"] = $this->Crud->select("correcao", "*", $where_texto);
            $dados["url"] = base_url();
            $dados["voltar"] = base_url() . "Estagiario/Correcao/gerenciar_entregas/" . $id_atividade . "/" . $id_turma; 
            $dados["display"] = "none";
            $dados["conteudo"] = $this->parser->parse("estagiario/correcao/ver_correcao", $dados, TRUE);
            $this->parser->parse("estagiario/layout", $dados);
        } else {
            redirect(base_url() . "Professor/Home");
        }
    }

}
