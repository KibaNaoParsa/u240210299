<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Esquemas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("parser");
        $this->load->library("session");
        $this->load->model("Crud", "c");
        $this->load->helper(array("url", "form", "text"));
        $aux = $this->session->userdata("id");
        if (empty($aux)) {
            redirect("");
        }
    }
    public function index() {
        $dados["url"] = base_url();
        $dados["esquemas"] = $this->c->select("arquivos", "*", "tipo = 1");
        foreach ($dados["esquemas"] as $key => $value) {
            $dados["esquemas"][$key]["url"] = base_url();
            $dados["esquemas"][$key]["id_genero"] = $this->c->select("genero", "nome", "id=".$dados["esquemas"][$key]["id_genero"])[0]["nome"];
        }
        $dados["conteudo"] = $this->parser->parse("aluno/esquemas/esquemas", $dados, TRUE);
        $this->parser->parse("aluno/layout", $dados);
    }

    public function download($path, $fileName = '') {
        if ($fileName == '') {
            $fileName = basename($path);
        }
        header("Content-Type: application/force-download");
        header("Content-type: application/octet-stream;");
        header("Content-Length: " . filesize(APPPATH . "../download/" . $path));
        header("Content-disposition: attachment; filename=" . $fileName);
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Expires: 0");
        readfile(APPPATH . "../download/" . $path);
        flush();
    }
    
}