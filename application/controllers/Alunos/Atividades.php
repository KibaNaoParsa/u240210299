<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

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

    public function index($sit = NULL, $bimestre = NULL) {
        $aux["id_turma"] = $this->session->userdata("id_turma");
        $info["turma"] = $this->c->select("turma", "nome", "id = " . $aux["id_turma"])[0]["nome"];
        $num = $this->c->select("atividade", "count(id)", $aux)[0]["count(id)"];
        if ($num > 0) {
            $id["id"] = $this->c->select_order("atividade", "id", $aux);
            foreach ($id["id"] as $key => $value) {
                $info["atividades"][$key] = $this->c->select("atividade", "*", "id =" . $id["id"][$key]["id"])[0];
                $info["atividades"][$key]["url"] = base_url();
                $aux = explode(" ", $info["atividades"][$key]["data_limite"]);
                $aux_data = explode("-", $aux[0]);
                $teste = $info["atividades"][$key]["data_limite"];
                $info["atividades"][$key]["data_limite"] = $aux_data[2] . "/" . $aux_data[1] . "/" . $aux_data[0] . " " . $aux[1];
                $situacao = $this->c->select("texto", "situacao", "id_atividade =" . $id["id"][$key]["id"], "id_aluno=".$this->session->userdata("id"));
                $info["atividades"][$key]["exemplo"]= '<a href="' . base_url() . 'Arquivos/'.$info["atividades"][$key]["id_genero"]
                    .'/'.$info["atividades"][$key]["bimestre"].'/1'.'"  class="btn btn-primary">Exemplos</a>';
                $info["atividades"][$key]["esquema"]= '<a href="' . base_url() . 'Arquivos/'.$info["atividades"][$key]["id_genero"]
                    .'/'.$info["atividades"][$key]["bimestre"].'/1'.'"  class="btn btn-primary">Esquema</a>';
                if ($situacao != NULL) {
                    if ($situacao[0]["situacao"] == "Enviado") {
                        $info["atividades"][$key]["situacao"] = '<a href="' . base_url() . 'Correcoes/1/' . $info["atividades"][$key]["bimestre"] 
                            . '"  class="btn btn-dark">Enviado</a>';
                    } else if (strtotime($teste) > strtotime(date('d-m-Y H:i:s'))) {
                        $info["atividades"][$key]["situacao"] = '<a href="' . base_url() . 'Continuar/' . $info["atividades"][$key]["id"] 
                            . '"  class="btn btn-primary">Continuar</a>';
                    } else {
                        $info["atividades"][$key]["situacao"] = '<a href="' . base_url() . 'Atividades/4/' . $info["atividades"][$key]["bimestre"] 
                            . '"  class="btn btn-danger">Atrasado</a>';
                    }
                } else if ((strtotime($teste) > strtotime(date('d-m-Y H:i:s')))) {
                    $info["atividades"][$key]["situacao"] = '<a href="' . base_url() . 'Escrever/' . $info["atividades"][$key]["id"] . '"  class="btn btn-success">Escrever</a>';
                } else {
                    $info["atividades"][$key]["situacao"] = '<a href="' . base_url() . 'Atividades/4/' . $info["atividades"][$key]["bimestre"] 
                            . '"  class="btn btn-danger">Atrasado</a>';
                }
                $atividade[$info["atividades"][$key]["bimestre"]][$key] = $info["atividades"][$key];
            }
        }
        for ($i = 1; $i <= 4; $i++) {
            if (!isset($atividade[$i])) {
                $atividade[$i][0]["nome"] = "";
                $atividade[$i][0]["data_limite"] = "";
                $atividade[$i][0]["valor"] = "";
                $atividade[$i][0]["exemplo"] = "";
                $atividade[$i][0]["esquema"] = "";
                $atividade[$i][0]["situacao"] = "";
            }
            $atividade["alerta_bim_".$i][0]["display"] = "none";
            $atividade["alerta_bim_".$i][0]["status"] = "";
        }
        if ($sit == 1) {
            $atividade["alerta_bim_".$bimestre][0]["display"] = "block";
            $atividade["alerta_bim_".$bimestre][0]["status"] = "Você já iniciou um texto sobre essa atividade !";
            $atividade["alerta_bim_".$bimestre][0]["cor"] = "danger";
            $atividade["active"][0]["bim_".$bimestre] = "active";
            $atividade["show_active"][0]["show_".$bimestre] = "show active";
        } else if ($sit == 2) {
            $atividade["active"][0]["bim_".$bimestre] = "active";
            $atividade["show_active"][0]["show_".$bimestre] = "show active";
        } else if ($sit == 3) {
            $atividade["alerta_bim_".$bimestre][0]["display"] = "block";
            $atividade["alerta_bim_".$bimestre][0]["status"] = "O texto foi salvo como em andamento !";
            $atividade["alerta_bim_".$bimestre][0]["cor"] = "success";
            $atividade["active"][0]["bim_".$bimestre] = "active";
            $atividade["show_active"][0]["show_".$bimestre] = "show active";
        }else if($sit == 4){
            $atividade["alerta_bim_".$bimestre][0]["display"] = "block";
            $atividade["alerta_bim_".$bimestre][0]["status"] = "Já passou a data limite !";
            $atividade["alerta_bim_".$bimestre][0]["cor"] = "danger";
            $atividade["active"][0]["bim_".$bimestre] = "active";
            $atividade["show_active"][0]["show_".$bimestre] = "show active";
        }
        if (!isset($atividade["active"][0])){ 
            if ((strtotime("22-04-2018") > strtotime(date('d-m-Y')))) {
                $atividade["active"][0]["bim_1"] = "active";
                $atividade["show_active"][0]["show_1"] = "show active"; 
                $atividade["cor_1"] = "info"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "danger";
            } else if ((strtotime("14-07-2018") > strtotime(date('d-m-Y')))) {
                $atividade["active"][0]["bim_2"] = "active";
                $atividade["show_active"][0]["show_2"] = "show active";  
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "info"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "danger";
            } else if ((strtotime("02-10-2018") > strtotime(date('d-m-Y')))) {
                $atividade["active"][0]["bim_3"] = "active";
                $atividade["show_active"][0]["show_3"] = "show active";
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "info"; 
                $atividade["cor_4"] = "danger";
            } else {
                $atividade["active"][0]["bim_4"] = "active";
                $atividade["show_active"][0]["show_4"] = "show active"; 
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "info";
            }
        }else{
            if ((strtotime("22-04-2018") > strtotime(date('d-m-Y')))) {
                $atividade["cor_1"] = "info"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "danger";
            } else if ((strtotime("14-07-2018") > strtotime(date('d-m-Y')))) {
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "info"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "danger";
            } else if ((strtotime("02-10-2018") > strtotime(date('d-m-Y')))) {
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "info"; 
                $atividade["cor_4"] = "danger";
            } else {
                $atividade["cor_1"] = "danger"; 
                $atividade["cor_2"] = "danger"; 
                $atividade["cor_3"] = "danger"; 
                $atividade["cor_4"] = "info";
            }
        }
        $dados["url"] = base_url();
        $dados["msg"] = "none";
        $dados["conteudo"] = $this->parser->parse("aluno/atividades/atividades", $atividade, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function escrever($id_atividade, $sit = null) {
        $dados["url"] = base_url();
        $dados["id_atividade"] = $id_atividade;
        $dados["atividade"] = $this->c->select("atividade", "nome, descricao, bimestre", "id =" . $id_atividade);
        $dados["bimestre"] = $dados["atividade"][0]["bimestre"];
        $dados["conteudo"] = $this->parser->parse("aluno/atividades/escrever", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function inserir($id_atividade, $bimestre) {
        $info = $this->input->post();
        $info["id_aluno"] = $this->session->userdata("id");
        $info["id_atividade"] = $id_atividade;
        if ($info["situacao"] == "Visualizar") {
            $this->c->insere("texto", $info);
            $id = $this->db->insert_id();
            $dados["url"] = base_url();
            $info["url"] = base_url();
            $info["id"] = $id;
            $info["bimestre"] = $bimestre;
            $dados["conteudo"] = $this->parser->parse("aluno/atividades/visualizar", $info, TRUE);
            $this->parser->parse("aluno/layout", $dados);
        } else if ($info["situacao"] == "Enviar") {
            $info["situacao"] = "Enviado";
            $caminho = 'Correcoes/1/';
            $this->c->insere("texto", $info);
            redirect(base_url() . $caminho .$bimestre);
        } else if ($info["situacao"] == "Em andamento") {
              $caminho = 'Atividades/3/';
            $this->c->insere("texto", $info);
            redirect(base_url() . $caminho .$bimestre);
        }
    }
    
    public function continuar($id) {
        $dados["url"] = base_url();
        $info = $this->c->select("texto", "id, titulo, conteudo, id_atividade, situacao", "id_atividade =" . $id, " id_aluno =" . $this->session->userdata("id"))[0];
        $info["atividade"] = $this->c->select("atividade", "nome, descricao, bimestre", "id =" . $info["id_atividade"]);
        $info["bimestre"] = $info["atividade"][0]["bimestre"];
        $info["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("aluno/atividades/editar", $info, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function editar($id_atividade, $id_texto, $bimestre) {
        $info = $this->input->post();
        $info["id_aluno"] = $this->session->userdata("id");
        $info["id_atividade"] = $id_atividade;
        if ($info["situacao"] == "Visualizar") {
            $this->c->update("texto", $info, "id =" . $id_texto);
            $dados["url"] = base_url();
            $info["url"] = base_url();
            $info["id"] = $id_texto;
            $info["bimestre"] = $bimestre;
            $dados["conteudo"] = $this->parser->parse("aluno/atividades/visualizar", $info, TRUE);
            $this->parser->parse("aluno/layout", $dados);
        } else if ($info["situacao"] == "Enviar") {
            $info["situacao"] = "Enviado";
            $caminho = 'Correcoes/1/';
            $this->c->update("texto", $info, "id =" . $id_texto);
            redirect(base_url() . $caminho .$bimestre);
        } else if ($info["situacao"] == "Em andamento") {
            $caminho = 'Atividades/3/';
            $this->c->update("texto", $info, "id =" . $id_texto);
            redirect(base_url() . $caminho .$bimestre);
        } else {
            redirect(base_url() . 'Continuar/' .$id_atividade);
        }
    }
    
    public function enviar($id) {
        $info["situacao"] = "Enviado";
        $this->c->update("texto", $info, "id =" . $id);
        redirect(base_url() . 'Correcoes');
    }
    
    public function arquivos($id_genero, $bimestre, $tipo) {
        $dados["url"] = base_url();
        $dados["bimestre"] = $bimestre;
        if ($tipo==0){
            $dados["nome"] = "Exemplos";
        }else if ($tipo==1){
            $dados["nome"] = "Esquema";
        }
        $dados["genero"] = $this->c->select("genero", "nome", "id =" . $id_genero)[0]["nome"];
        $dados["arquivos"] = $this->c->select("arquivos", "*", "id_genero =" . $id_genero, "tipo=" . $tipo);
        foreach ($dados["arquivos"] as $key => $value) {
            $dados["arquivos"][$key]["url"] = base_url();
            $dados["arquivos"][$key]["genero"] = $dados["genero"];
        }
        $dados["conteudo"] = $this->parser->parse("aluno/atividades/arquivos", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
}