<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Correcoes extends CI_Controller {

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
        $dados["url"] = base_url();
        $situacao["situacao"] = 'Enviado';
        $info["texto"] = $this->c->select("texto", "id, titulo, id_atividade", "id_aluno =" . $this->session->userdata("id"), $situacao);
        foreach ($info["texto"] as $key => $value) {
            $info["texto"][$key]["nome_atividade"] = $this->c->select("atividade", "nome", "id =" . $value["id_atividade"])[0]["nome"];
            $info["texto"][$key]["bimestre"] = $this->c->select("atividade", "bimestre", "id =" . $value["id_atividade"])[0]["bimestre"];
            $info["texto"][$key]["url"] = base_url();
            $info["texto"][$key]["visualizar"] = '<a href="' . base_url() . 'Visualizar_texto/' . $info["texto"][$key]["id"] . '/0/' . $info["texto"][$key]["bimestre"]. '"  class="btn btn-primary">Visualizar</a>';
            if (isset($this->c->select("correcao", "id", "id_texto =" . $value["id"], 'status = "Finalizado"')[0]["id"])) {
                $info["texto"][$key]["nota"] = $this->c->select("correcao", "nota", "id_texto =" . $value["id"])[0]["nota"];
                $info["texto"][$key]["comen"] = $this->c->select("correcao", "comentarios", "id_texto =" . $value["id"])[0]["comentarios"];
                if ($info["texto"][$key]["comen"] != "") {
                    $info["texto"][$key]["comen"] = '<a href="' . $dados["url"] . 'Comentarios/' . $value["id"] . '"  class="btn btn-success">Abrir</a>';
                }
            } else {
                $info["texto"][$key]["nota"] = "";
                $info["texto"][$key]["comen"] = "";
            }
            if ($info["texto"][$key]["bimestre"] == 1){
				$texto["1"][$key] = $info["texto"][$key];
            } else if ($info["texto"][$key]["bimestre"] == 2){
                $texto["2"][$key] = $info["texto"][$key];
            } else if ($info["texto"][$key]["bimestre"] == 3){
                $texto["3"][$key] = $info["texto"][$key];
            } else {
                $texto["4"][$key] = $info["texto"][$key];
            }
        }
        for ($i = 1; $i <= 4; $i++) {
            if (!isset($texto[$i][0])) {
                $texto[$i][0]["titulo"] = "";
                $texto[$i][0]["nome_atividade"] = "";
                $texto[$i][0]["bimestre"] = "";
                $texto[$i][0]["nota"] = "";
                $texto[$i][0]["comen"] = "";
                $texto[$i][0]["visualizar"] = "";
            }
            $texto["alerta_bim_".$i][0]["display"] = "none";
            $texto["alerta_bim_".$i][0]["status"] = "";
        }
        if ($sit == 1) {
            $texto["alerta_bim_".$bimestre][0]["display"] = "block";
            $texto["alerta_bim_".$bimestre][0]["status"] = "O texto foi enviado com sucesso !";
            $texto["active"][0]["bim_".$bimestre] = "active";
            $texto["show_active"][0]["show_".$bimestre] = "show active";
        } 
        if ((strtotime("22-04-2018") > strtotime(date('d-m-Y')))) {
			$texto["active"][0]["bim_1"] = "active";
			$texto["show_active"][0]["show_1"] = "show active";  
			$texto["cor_1"] = "info"; 
            $texto["cor_2"] = "danger"; 
            $texto["cor_3"] = "danger"; 
            $texto["cor_4"] = "danger";
        } else if ((strtotime("14-07-2018") > strtotime(date('d-m-Y')))) {
			$texto["active"][0]["bim_2"] = "active";
			$texto["show_active"][0]["show_2"] = "show active"; 
			$texto["cor_1"] = "danger"; 
            $texto["cor_2"] = "info"; 
            $texto["cor_3"] = "danger"; 
            $texto["cor_4"] = "danger";
        } else if ((strtotime("02-10-2018") > strtotime(date('d-m-Y')))) {
			$texto["active"][0]["bim_3"] = "active";
			$texto["show_active"][0]["show_3"] = "show active";
			$texto["cor_1"] = "danger"; 
            $texto["cor_2"] = "danger"; 
            $texto["cor_3"] = "info"; 
            $texto["cor_4"] = "danger";
        } else {
			$texto["active"][0]["bim_4"] = "active";
			$texto["show_active"][0]["show_4"] = "show active";
			$texto["cor_1"] = "danger"; 
            $texto["cor_2"] = "danger"; 
            $texto["cor_3"] = "danger"; 
            $texto["cor_4"] = "info";
        }
        if ($bimestre != 0) {
            $texto["active"][0]["bim_".$bimestre] = "active";
            $texto["show_active"][0]["show_".$bimestre] = "show active";
        }
        $dados["conteudo"] = $this->parser->parse("aluno/correcoes/correcoes", $texto, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function visualizar_texto($id, $caminho, $bimestre) {
        $dados= $this->c->select("texto", "titulo, conteudo", "id =" . $id)[0];
        $dados["url"] = base_url();
        $dados["caminho"] = $caminho.'/'.$bimestre;
        $dados["conteudo"] = $this->parser->parse("aluno/correcoes/visualizar_envio", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
    
    public function comentarios($id) {
        $dados["texto_marcado"] = $this->c->select("texto_marcado", "titulo, conteudo", "id_texto =" . $id);
        $dados["comentarios"] = $this->c->select("correcao", "comentarios", "id_texto =" . $id, 'status = "Finalizado"')[0]["comentarios"];
        $dados["url"] = base_url();
        $dados["conteudo"] = $this->parser->parse("aluno/correcoes/comentarios", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }
}