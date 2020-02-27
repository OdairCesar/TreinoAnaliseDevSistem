<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QueryPerguntas
 *
 * @author Odair Cesar
 */
require_once 'ConexaoBaseDados.php';

class SQLPerguntas extends ConexaoBaseDados {
    //put your code here
    private $disciplina;
    private $perguntas;
    private $query;
    
    public function Query($disciplina){
        $this->setDisciplina($disciplina);
        $this->MontarQuery($this->getDisciplina());
    }
    protected function MontarQuery($disciplina){
        $this->setQuery("SELECT * FROM disciplinas WHERE nomeDisciplina = $disciplina LIMIT 10");
    }

    protected function FazerConsulta(){
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OB3)){
            $this->setPerguntas(array($res->idPergunta, $res->uniEstudo, $res->forte, $res->pergunta, $res->resA, $res->resB, $res->resC, $res->resD, $res->resE, $res->resCORRETA));
        }
    }

    public function getDisciplina() {
        return $this->disciplina;
    }
    public function getPerguntas() {
        return $this->perguntas;
    }
    private function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }
    private function setPerguntas($perguntas) {
        $this->perguntas = $perguntas;
    }
    public function getQuery() {
        return $this->query;
    }
    public function setQuery($query) {
        $this->query = $query;
    }
}
