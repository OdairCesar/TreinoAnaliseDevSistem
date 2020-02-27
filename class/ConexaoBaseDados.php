<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoBaseDados
 *
 * @author Odair Cesar
 */
class ConexaoBaseDados {
    //put your code here
    private $local, //local do servidor de dados
            $usuario,//nome do usuario que acessará o banco de dados
            $senha, //senha do mesmo
            $conexao, //sera a conexão do php com o servidor do SGBD
            $db;//nome do banco de dados
    
    private function PassarValores($usuario, $senha, $local, $db){//aqui passa os dados para conectar, somente quanto for formar o objeto de conexao
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setLocal($local);
        $this->setDb($db);
    }
    private function PassarValoresManual(){//aqui é passado os dados no proprio codigo, é um risco já que deixa os dados do seu servidor acessiveis
        $this->setUsuario("root");
        $this->setDb("id...");
        $this->setSenha("");
        $this->setLocal("localhost");
    }
    private function Acessar(){// aqui nos conectamos com o SGBD
        try{
            $this->conexao = new PDO('mysql:host='.$this->getLocal().';dbname='. $this->getDb(), $this->getUsuario(), $this->getSenha());
            $this->conexao->exec("set names utf8");
        } catch(PDOException $e){
            echo "Erro ao conectar".$e->getMessage();
        }
    }
    private function __construct($logico, $usuario, $senha, $local, $db) {
        /* CONSTRUTOR DA CLASSE NELE TEM UM LOGICO PARA SABER SE OS DADOS DO SGBD SERÁ PASSADO NA CRIAÇÃO OU NO CODIGO ANTERIORES
         */
        if($logico){
            $this->PassarValoresManual();
        }else{
            $this->PassarValores($usuario, $senha, $local, $db);
        }
        $this->Acessar();
    }


    public function getLocal() {
        return $this->local;
    }
    public function getUsuario() {
        return $this->usuario;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function getConexao() {
        return $this->conexao;
    }
    public function getDb() {
        return $this->db;
    }
    public function setLocal($local) {
        $this->local = $local;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    public function setConexao($conexao) {
        $this->conexao = $conexao;
    }
    public function setDb($db) {
        $this->db = $db;
    }
}
