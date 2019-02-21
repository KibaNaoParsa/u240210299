<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function select($tabela = NULL, $campo = "*", $where = NULL, $where_2 = NULL) {
        $this->db->select($campo);
        if ($where) {
            $this->db->where($where);
        }
        if ($where_2) {
            $this->db->where($where_2);
        }
        $result = $this->db->get($tabela);
        return $result->result_array();
    }

    public function insere($tabela, $dados) {
        return $this->db->insert($tabela, $dados);
    }

    public function update($tabela, $dados, $where) {
        $this->db->where($where);
        return $this->db->update($tabela, $dados);
    }

    public function delete($tabela, $where) {
        $this->db->where($where);
        return $this->db->delete($tabela);
    }

    public function aluno_as_texto_as_correcao($id = NULL, $idTurma) {
        $query = "SELECT texto.id, aluno.nome, texto.situacao, texto.data_envio, correcao.status FROM aluno JOIN turma ON turma.id = ".$idTurma." AND aluno.id_turma = ".$idTurma." LEFT JOIN texto ON texto.id_aluno = aluno.id AND texto.id_atividade = ".$id." LEFT JOIN correcao ON correcao.id_texto = texto.id;";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function texto_as_atividade_as_aluno($id = NULL) {
        $query = "SELECT texto.id,texto.titulo,texto.conteudo, aluno.nome, texto.situacao FROM texto JOIN aluno ON texto.id_aluno=aluno.id AND texto.id = " . $id . " JOIN atividade ON texto.id_atividade = atividade.id ORDER BY aluno.nome;";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    
    public function notas($id = NULL, $idTurma){
        $query = "SELECT aluno.nome, correcao.nota FROM aluno JOIN turma ON turma.id = ".$idTurma." AND aluno.id_turma = ".$idTurma." LEFT JOIN texto ON texto.id_aluno = aluno.id AND texto.id_atividade = ".$id." LEFT JOIN correcao ON correcao.id_texto = texto.id AND correcao.status='finalizado' ORDER BY aluno.nome;";
        $result = $this->db->query($query);
        return $result->result_array();
    }
    
    public function gerenciador_turmas($id_gerenciador = NULL){
        $this->db->select("turma.id, turma.nome");
        $this->db->from("gerenciador_turma");
        $this->db->where("gerenciador_turma.id_gerenciador = $id_gerenciador");
        $this->db->join("turma", "turma.id = gerenciador_turma.id_turma");
        $result = $this->db->get();
        return $result->result_array();
    }

    public function select_order($tabela = NULL, $campo = "*", $where = NULL, $where_2 = NULL) {
        $this->db->select($campo);
        if ($where) {
            $this->db->where($where);
        }
        if ($where_2) {
            $this->db->where($where_2);
        }
        $this->db->order_by("bimestre", "des");
        $result = $this->db->get($tabela);
        return $result->result_array();
    }

}
?>


