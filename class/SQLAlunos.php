<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QueryAluno
 *
 * @author Odair Cesar
 */
require_once 'ConexaoBaseDados.php';

class SQLAlunos extends ConexaoBaseDados {
    //put your code here
    private $infoAluno;
    private $query;
    
    protected function MontarQuery($idAluno){//Passamos o id informado pelo aluno para um select
        $this->setQuery("SELECT * FROM disciplinas WHERE idAluno = $idAluno LIMIT 1");
    }

    protected function FazerConsulta(){
        /* Pesquisamos os dados do aluno no banco de dados. 
         * Se caso ele nao existir para um logico falso que usaremos depois, para negar a contabilização de perguntas acertadas ou erradas.
         */
        $select = $this->getConexao()->query($this->getQuery());
        while($res = $select->fetch(PDO::FETCH_OB3)){
            $this->setInfoAluno(Array($res->idAluno, $res->nomeAluno, $res->contAcertadas, $res->contErradas));
        }
        if ($this->getInfoAluno()[1] == null){
            $this->setInfoAluno(false);
        }
    }
    public function getQuery() {
        return $this->query;
    }
    public function setQuery($query) {
        $this->query = $query;
    }
    public function getAluno() {
        return $this->aluno;
    }
    public function getInfoAluno() {
        return $this->infoAluno;
    }
    public function setAluno($aluno) {
        $this->aluno = $aluno;
    }
    public function setInfoAluno($infoAluno) {
        $this->infoAluno = $infoAluno;
    }
}
