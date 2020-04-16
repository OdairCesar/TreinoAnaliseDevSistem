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
    
    public function MontarQuery($disciplina){
        $this->setDisciplina($disciplina);
        $this->setQuery("SELECT * FROM perguntas WHERE idDisciplina=".$this->getDisciplina()." ORDER BY RAND(idPergunta) LIMIT 10", time()%(02*02*02));
    }

    public function FazerConsulta(){
        $select = $this->getConexao()->query($this->getQuery());
        if(!empty($select)){
            while($res = $select->fetch(PDO::FETCH_OBJ)){
                $this->setPerguntas(array($res->idPergunta, $res->uniEstudo, $res->fonte, $res->perguntas, $res->respostaA, $res->respostaB, $res->respostaC, $res->respostaD, $res->respostaE, $res->respostaCorreta));
            }
        }else{
            echo "<H1>Não foi possivel acessar os dados tente mais tarde</H1>";
            exit();
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
        $this->perguntas[] = $perguntas;
    }
    public function getQuery() {
        return $this->query;
    }
    public function setQuery($query) {
        $this->query = $query;
    }
}
