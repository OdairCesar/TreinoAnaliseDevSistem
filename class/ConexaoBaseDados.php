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
    private $local, $usuario, $senha, $conexao, $db;
    
    private function PassarValores($usuario, $senha, $local, $db){
        $this->setUsuario($usuario);
        $this->setSenha($senha);
        $this->setLocal($local);
        $this->setDb($db);
    }
    private function PassarValoresManual(){
        $this->setUsuario("root");
        $this->setDb("id...");
        $this->setSenha("");
        $this->setLocal("localhost");
    }
    private function Acessar(){
        try{
            $this->conexao = new PDO('mysql:host='.$this->getLocal().';dbname='. $this->getDb(), $this->getUsuario(), $this->getSenha());
            $this->conexao->exec("set names utf8");
        } catch(PDOException $e){
            echo "Erro ao conectar".$e->getMessage();
        }
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
