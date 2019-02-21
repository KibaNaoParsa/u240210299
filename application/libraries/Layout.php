<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Layout {

    protected $CI;

    public function __construct() {
        $CI = & get_instance();
        $CI->load->helper('url');
        $CI->load->library('session');
        $CI->load->library('parser');
        $CI->config->item('base_url');
    }

    public function atualiza_dados($array = array()) {
        $CI = & get_instance();
        $sessao = $CI->session->userdata();
        $sessao["mensagens"] = $array;
        $CI->session->set_userdata($sessao);
    }

    public function layout_professor($dados=NULL) {
        $CI = & get_instance();
        if (!empty($CI->session->userdata("mensagens"))) {
            $dados["msg"] = $CI->session->userdata("mensagens")["msg"];
            $dados["display"] = $CI->session->userdata("mensagens")["display"];
            $dados["cor"] = $CI->session->userdata("mensagens")["cor"];
            $this->atualiza_dados(array());
        } else {
            $dados["display"] = "none";
        }
        
        if(empty($dados["nav_vertical"])){
            $dados["nav_vertical"] = " ";
        }
        $dados["url"] = base_url();
        return $CI->parser->parse("professor/layout", $dados);
    }
}
