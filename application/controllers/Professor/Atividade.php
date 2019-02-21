<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividade extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("layout");
        $sessao = $this->session->userdata();
        if(!isset($sessao["id"]) || $sessao["tipo_usuario"] != 1){
            redirect(base_url()."Inicio");
        }
    }

    public function index($id_turma = NULL, $id_bim = NULL) {
        if ($id_turma != NULL) {
            if ($id_bim == NULL) {
                $dados["bimestres"] = array(0 => array("bimestre" => 1), 1 => array("bimestre" => 2), 2 => array("bimestre" => 3), 3 => array("bimestre" => 4));
                foreach ($dados["bimestres"] as $key => $value) {
                    $dados["bimestres"][$key]["url"] = base_url();
                    $dados["bimestres"][$key]["id_turma"] = $id_turma;
                }
                $dados["voltar"] = base_url() . "Professor/Turma";
                $dados["id"] = $this->session->userdata("id");
                $dados["url"] = base_url();
                $dados["conteudo"] = $this->parser->parse("professor/atividades/inicio", $dados, TRUE);
                return $this->layout->layout_professor($dados);
            } else {
                $where["id_turma"] = $id_turma;
                $where["bimestre"] = $id_bim;
                $dados["atividades"] = $this->Crud->select("atividade", "*", $where);
                foreach ($dados["atividades"] as $key => $value) {
                    $dados["atividades"][$key]["url"] = base_url();
                }
                $dados["modal"] = $dados["atividades"];
                $dados["voltar"] = base_url() . "Professor/Atividade/index/" . $id_turma;
                $dados["id"] = $this->session->userdata("id");
                $dados["id_turma"] = $id_turma;
                $dados["id_bimestre"] = $id_bim;
                $where_turma["id"] = $id_turma;
                $dados["nome"] = $this->Crud->select("turma", "nome", $where_turma)[0]["nome"];
                $dados["url"] = base_url();
                $dados["conteudo"] = $this->parser->parse("professor/atividades/gerenciar_atividades", $dados, TRUE);
                return $this->layout->layout_professor($dados);
            }
        }
    }

    public function adicionar_atividade($idTurma = NULL, $bimestre = NULL) {
        if ($idTurma == NULL && $bimstre == NULL) {
            redirect("Professor/Home");
        } else {
            $form = $this->input->post();
            if (empty($form)) {
                $dados["url"] = base_url();
                $dados["display"] = "none";
                $dados["id"] = $this->session->userdata("id");
                $dados["voltar"] = base_url() . "Professor/Atividade/index/" . $idTurma . "/" . $bimestre;
                $dados["id_turma"] = $idTurma;
                $dados["bimestre"] = $bimestre;
                $dados["opt_genero"] = $this->Crud->select("genero");
                $dados["opt_tipo"] = $this->Crud->select("tipo_textual");
                $dados["conteudo"] = $this->parser->parse("professor/atividades/adicionar_atividade", $dados, TRUE);
                $this->parser->parse("professor/layout", $dados);
            } else {
                $this->form_validation->set_data($form);
                $this->form_validation->set_rules("nome", "NOME", "required");
                $this->form_validation->set_rules("descricao", "DESCRICAO", "required");
                $this->form_validation->set_rules("data_limite", "DATA_LIMITE", "required");
                $this->form_validation->set_rules("id_genero", "ID_GENERO", "required");
                $this->form_validation->set_rules("id_tipo", "ID_TIPO", "required");
                $this->form_validation->set_rules("valor", "VALOR", "required");
                if ($this->form_validation->run() != FALSE) {
                    if ($this->Crud->insere("atividade", $form)) {
                        $message["display"] = "block";
                        $message["cor"] = "success";
                        $message["msg"] = "Atividade Inserida com sucesso";
                    } else {
                        $message["display"] = "block";
                        $message["cor"] = "success";
                        $message["msg"] = "Erro ao inserir no BD.";
                    }
                    $this->layout->atualiza_dados($message);
                    return redirect("Professor/Atividade/index/" . $idTurma . "/" . $bimestre);
                }
            }
        }
    }

    public function editar_atividade($id_atividade = NULL, $idTurma = NULL, $bimestre = NULL) {
        if ($idTurma == NULL || $bimestre == NULL || $id_atividade == NULL) {
            redirect("Professor/Home");
        } else {
            $form = $this->input->post();
            if (empty($form)) {
                $where["id"] = $id_atividade;
                $dados = $this->Crud->select("atividade", "*", $where)[0];
                $dados["min_date"] = date('Y-m-d');
                $dados["data_limite"] = date("Y-m-d", strtotime($dados["data_limite"]));
                $dados["url"] = base_url();
                $dados["display"] = "none";
                $dados["id"] = $this->session->userdata("id");
                $dados["voltar"] = base_url() . "Professor/Atividade/index/" . $idTurma . "/" . $bimestre;
                $dados["id_turma"] = $idTurma;
                $dados["bimestre"] = $bimestre;
                $dados["id_atividade"] = $id_atividade;
                $dados["opt_genero"] = $this->Crud->select("genero");
                foreach($dados["opt_genero"] as $key=>$value){
                    if($dados["opt_genero"][$key]["id"] == $dados["id_genero"]){
                       $dados["opt_genero"][$key]["selected"] = "selected";
                       break;
                    } else {
                        $dados["opt_genero"][$key]["selected"] = " ";
                    }
                }
                
                $dados["opt_tipo"] = $this->Crud->select("tipo_textual");
                foreach($dados["opt_tipo"] as $key=>$value){
                    if($dados["opt_tipo"][$key]["id"] == $dados["id_genero"]){
                       $dados["opt_tipo"][$key]["selected"] = "selected";
                       break;
                    } else {
                        $dados["opt_tipo"][$key]["selected"] = " ";
                    }
                }
                
                $dados["conteudo"] = $this->parser->parse("professor/atividades/editar_atividade", $dados, TRUE);
                return $this->layout->layout_professor($dados);
            } else {
                $this->form_validation->set_data($form);
                $this->form_validation->set_rules("nome", "NOME", "required");
                $this->form_validation->set_rules("descricao", "DESCRICAO", "required");
                $this->form_validation->set_rules("data_limite", "DATA_LIMITE", "required");
                $this->form_validation->set_rules("id_genero", "ID_GENERO", "required");
                $this->form_validation->set_rules("id_tipo", "ID_TIPO", "required");
                $this->form_validation->set_rules("valor", "VALOR", "required");
                if ($this->form_validation->run() != FALSE) {
                     $where["id"] = $id_atividade;
                    if ($this->Crud->update("atividade", $form, $where)) {
                        $message["display"] = "block";
                        $message["cor"] = "success";
                        $message["msg"] = "Atividade Editada com sucesso";
                    } else {
                        $message["display"] = "block";
                        $message["cor"] = "success";
                        $message["msg"] = "Erro ao editar atividade no BD.";
                    }
                    $this->layout->atualiza_dados($message);
                    return redirect("Professor/Atividade/index/" . $idTurma . "/" . $bimestre);
                }
            }
        }
    }

    public function deletar_atividade($id = NULL, $idTurma = NULL, $bimestre = NULL) {
        if ($id == NULL || $idTurma == NULL || $bimestre == NULL) {
            redirect("Professor/Home");
        } else {
            $where["id"] = $id;
            if ($this->Crud->delete("atividade", $where)) {
                $message["display"] = "block";
                $message["msg"] = "Atividade deletada com sucesso!";
                $message["cor"] = "success";
            } else {
                $message["display"] = "block";
                $message["msg"] = "Erro ao deletar atividade!";
                $message["cor"] = "danger";
            }
            $this->layout->atualiza_dados($message);
            return redirect("Professor/Atividade/index/" . $idTurma . "/" . $bimestre);
        }
    }

    public function exibir_atividade($id = NULL, $idTurma = NULL, $bimestre = NULL) {
        if ($id != NULL || $idTurma != NULL || $bimestre != NULL) {
            $where["id"] = $id;
            $atividade = $this->Crud->select("atividade", "*", $where)[0];
            $dados["nome"] = $atividade["nome"];
            $dados["descricao"] = $atividade["descricao"];
            $dados["data_limite"] = $dados["data_limite"] = date("d-m-Y", strtotime($atividade["data_limite"]));;
            $where["id"] = $atividade["id_genero"];
            $dados["nome_genero"] = $this->Crud->select("genero", "nome", $where)[0]["nome"];
            $where["id"] = $atividade["id_tipo"];
            $dados["nome_tipo"] = $this->Crud->select("tipo_textual", "nome", $where)[0]["nome"];
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["id"] = $this->session->userdata("id");
            $dados["voltar"] = base_url() . "Professor/Atividade/index/" . $idTurma . "/" . $bimestre;
            $dados["id_turma"] = $idTurma;
            $dados["bimestre"] = $bimestre;

            $dados["conteudo"] = $this->parser->parse("professor/atividades/exibir_atividade", $dados, TRUE);
            $this->layout->layout_professor($dados);
        }
    }

    public function notas($id_turma = null, $id_atividade = NULL) {
        if ($id_turma == NULL) {
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $where["id_professor"] = $this->session->userdata("id");
            $dados["id"] = $this->session->userdata("id");
            $dados["turmas"] = $this->Crud->select("turma", "*", $where);
            foreach ($dados["turmas"] as $key => $value) {
                $dados["turmas"][$key]["url"] = base_url();
            }
            $dados["conteudo"] = $this->parser->parse("professor/atividades/escolher_turma", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else if ($id_atividade == NULL) {
            $dados["url"] = base_url();
            $dados["display"] = "none";
            $dados["id"] = $this->session->userdata("id");
            $where["id_turma"] = $id_turma;
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
            $dados["voltar"] = base_url() . "Professor/Atividade/notas";
            $dados["conteudo"] = $this->parser->parse("professor/atividades/escolher_atividade", $dados, true);
            return $this->layout->layout_professor($dados);
        } else {
            $dados["voltar"] = base_url() . "Professor/Atividade/notas/".$id_turma;
            $where_atividade["id"] = $id_atividade;
            $atividade = $this->Crud->select("atividade", "bimestre, valor, nome" , $where_atividade)[0];
            $dados["nome"] = $atividade["nome"];
            $dados["bimestre"] = $atividade["bimestre"];
            $dados["valor"] = $atividade["valor"];
            $dados["notas"] = $this->Crud->notas($id_atividade, $id_turma);
            foreach ($dados["notas"] as $key=>$value){
                if($dados["notas"][$key]["nota"] == NULL){
                    $dados["notas"][$key]["nota"] = "<p style='color: red'>Não entregou ou não foi corrigido</p>";
                }
            }
            $dados["conteudo"] = $this->parser->parse("professor/atividades/notas", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        }
    }

}
