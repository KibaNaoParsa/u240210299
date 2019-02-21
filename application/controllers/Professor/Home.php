<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library("layout");
        $sessao = $this->session->userdata();
        $sessao = $this->session->userdata();
        if(!isset($sessao["id"]) || $sessao["tipo_usuario"] != 1){
            redirect(base_url()."Inicio");
        }
    }

    public function index() {
        $dados["url"] = base_url();
        if($this->session->userdata("email") == "edigonfer@gmail.com"){
            $dados["convidar_professor"] = '<a href="'.base_url().'Professor/Home/convidar_professor" class="btn btn-white">Convidar  Professor</a></p>';
        } else {
            $dados["convidar_professor"] = "";
        }
        
        $dados["conteudo"] = $this->parser->parse("professor/home/inicio_professor", $dados, TRUE);
        $this->layout->layout_professor($dados);
    }

    public function perfil() {
        $dados["url"] = base_url();
        $dados["perfil"][0] = $this->session->userdata();
        $dados["conteudo"] = $this->parser->parse("professor/home/perfil", $dados, TRUE);
        return $this->layout->layout_professor($dados);
    }

    public function editar_perfil() {
        $form = $this->input->post();
        if (empty($form)) {
            $dados["url"] = base_url();
            $dados["nome"] = $this->session->userdata("nome");
            $dados["email"] = $this->session->userdata("email");
            $dados["conteudo"] = $this->parser->parse("professor/home/editar_perfil", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else {
            $this->form_validation->set_data($form);
            $this->form_validation->set_rules("nome", "NOME", "required");
            $this->form_validation->set_rules("email", "EMAIL", "required");
            if ($this->form_validation->run()) {
                $where["id"] = $this->session->userdata("id");
                if ($this->Crud->update("professor", $form, $where)) {
                    $message["cor"] = "success";
                    $message["msg"] = "Seus dados foram salvos com sucesso!";
                    $message["display"] = "block";
                    $sessao = $this->Crud->select("professor", "nome,email", $where)[0];
                    $this->session->set_userdata($sessao);
                } else {
                    $message["cor"] = "danger";
                    $message["msg"] = "Erro no Banco de Dados, consulte um desenvolvedor!";
                    $message["display"] = "block";
                }
                $this->layout->atualiza_dados($message);
                return redirect(base_url()."Professor/Home/perfil"); 
            } else {
                $message["cor"] = "danger";
                $message["msg"] = "Preencha todos os campos!";
                $message["display"] = "block";
                $this->layout->atualiza_dados($message);
                return redirect(base_url . "Professor/Home/editar_perfil");
            }
        }
    }
    
    public function enviar($to, $link, $who) {
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
        $dados["link"] = $link;
        $dados["who"] = $who;
        $htmlMessage = $this->parser->parse('professor/home/email_convite', $dados, true);
        $this->email->subject("Diggittus - Convite ". $who);
        $this->email->message($htmlMessage);
        if ($this->email->send()) {
            return true;
        } else {
            show_error($this->email->print_debugger());
            return false;
        }
    }
    
    public function convidar_professor() {
        $form = $this->input->post();
        if(empty($form)){
            $dados["url"] = base_url();
            $dados["who"] = "Professor";
            $dados["func"] = "convidar_professor";
            $dados["voltar"] = base_url()."Professor/Home";
            $dados["conteudo"] = $this->parser->parse("professor/home/convidar", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else {
            $link = base_url() . "Inicio/cadastro_professor";
            if($this->enviar($form["email"],$link, "Professor" )){
                $where["email"] = $form["email"];
                $tem = $this->Crud->select("convidados", "*", $where);
                if(empty($tem)){
                    $this->Crud->insere("convidados", $form);
                }
                $message["display"] = "block";
                $message["cor"] = "success";
                $message["msg"] = "Professor convidado com sucesso";
            } else {
                $message["display"] = "block";
                $message["cor"] = "success";
                $message["msg"] = "Professor convidado com sucesso";
            }
            $this->layout->atualiza_dados($message);
            return redirect(base_url()."Professor/Home/convidar_professor");
        }
    }
    
    public function convidar_estagiario() {
        $form = $this->input->post();
        if(empty($form)){
            $dados["url"] = base_url();
            $dados["who"] = "Estagiário";
            $dados["func"] = "convidar_estagiario";
            $dados["voltar"] = base_url()."Professor/Home";
            $dados["conteudo"] = $this->parser->parse("professor/home/convidar", $dados, TRUE);
            return $this->layout->layout_professor($dados);
        } else {
            $link = base_url() . "Inicio/cadastro_estagiario";
            if($this->enviar($form["email"],$link, "Estagiário" )){
                $where["email"] = $form["email"];
                $tem = $this->Crud->select("convidados", "*", $where);
                if(empty($tem)){
                    $this->Crud->insere("convidados", $form);
                }
                $message["display"] = "block";
                $message["cor"] = "success";
                $message["msg"] = "Professor convidado com sucesso";
            } else {
                $message["display"] = "block";
                $message["cor"] = "success";
                $message["msg"] = "Professor convidado com sucesso";
            }
            $this->layout->atualiza_dados($message);
            return redirect(base_url()."Professor/Home/convidar_estagiario");
        }
    }
}
