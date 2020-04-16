<?php
require_once 'SQLPerguntas.php';
require_once 'SQLAlunos.php';

class Pergunta {
	private $perg, $aluno;

	//Metodo construtor da classe
	public function __construct ($disci) {
            $this->perg = new SQLPerguntas(false, null, null, null, null);
            $this->PesquisarPerguntas($disci);
	}

	//Aqui começamos os metodos que criaram o html da pagina
	public function MontarPerguntas(){
            echo "<form method='post' action=''>";
            $f = count($this->getPerg());
            for($i = 0; $i < $f; $i++){
                echo "<div class='col-lg-12 col-md-5 col-xs-12 col-sm-12'>";
            	echo "<p class='numPerg'>Pergunta: ".$this->getPerg()[$i][2].$this->getPerg()[$i][1]."</p>";
                echo "<p>".$this->getPerg()[$i][3]."</p>";
                echo "<p><input id='".$i."A' type='radio' name='resposta".$i."' value='A'>&nbsp<label for='".$i."A'>".$this->getPerg()[$i][4]."</label> </p>";
                echo "<p><input id='".$i."B' type='radio' name='resposta".$i."' value='B'>&nbsp<label for='".$i."B'>".$this->getPerg()[$i][5]."</label> </p>";
                echo "<p><input id='".$i."C' type='radio' name='resposta".$i."' value='C'>&nbsp<label for='".$i."C'>".$this->getPerg()[$i][6]."</label> </p>";
                echo "<p><input id='".$i."D' type='radio' name='resposta".$i."' value='D'>&nbsp<label for='".$i."D'>".$this->getPerg()[$i][7]."</label> </p>";
                echo "<p><input id='".$i."E' type='radio' name='resposta".$i."' value='E'>&nbsp<label for='".$i."E'>".$this->getPerg()[$i][8]."</label> </p>";
                echo "</div>";
            }
            echo "<center><input style='margin: 10px;' class='botao' type='submit' name='responter' value='Enviar Respostas'></center>";
            echo "</form>";
	}
    public function MontarPerguntasComResp($dele){
            echo "<form action='' method='post'>";
            $f = count($this->getPerg());
            for($i = 0; $i < $f; $i++){
                echo "<div class='col-lg-12 col-md-5 col-xs-12 col-sm-12'>";
                echo "<p class='numPerg'>Pergunta: ".$this->getPerg()[$i][2].$this->getPerg()[$i][1]."</p>";
                echo "<p>".$this->getPerg()[$i][3]."</p>";
                echo "<p ";
                if($dele[$i] === "A"){
                    echo "style='color: blue;'";
                }
                else if($this->getPerg()[$i][9] === "A"){
                    echo "style='color: red;'";
                }
                echo "><input id='".$i."A' type='radio' name='resposta".$i."' value='".$i."A'>&nbsp<label for='".$i."A'>".$this->getPerg()[$i][4]."</label> </p>";
                echo "<p ";
                if($dele[$i] === "B"){
                    echo "style='color: blue;'";
                }
                else if($this->getPerg()[$i][9] === "B"){
                    echo "style='color: red;'";
                }
                echo "><input id='".$i."B' type='radio' name='resposta".$i."' value='".$i."B'>&nbsp<label for='".$i."B'>".$this->getPerg()[$i][5]."</label> </p>";
                echo "<p ";
                if($dele[$i] === "C"){
                    echo "style='color: blue;'";
                }
                else if($this->getPerg()[$i][9] === "C"){
                    echo "style='color: red;'";
                }
                echo "><input id='".$i."C' type='radio' name='resposta".$i."' value='".$i."C'>&nbsp<label for='".$i."C'>".$this->getPerg()[$i][6]."</label> </p>";
                echo "<p ";
                if($dele[$i] === "D"){
                    echo "style='color: blue;'";
                }
                else if($this->getPerg()[$i][9] === "D"){
                    echo "style='color: red;'";
                }
                echo "><input id='".$i."D' type='radio' name='resposta".$i."' value='".$i."D'>&nbsp<label for='".$i."D'>".$this->getPerg()[$i][7]."</label> </p>";
                echo "<p ";
                if($dele[$i] === "E"){
                    echo "style='color: blue;'";
                }
                else if($this->getPerg()[$i][9] === "E"){
                    echo "style='color: red;'";
                }
                echo "><input id='".$i."E' type='radio' name='resposta".$i."' value='".$i."E'>&nbsp<label for='".$i."E'>".$this->getPerg()[$i][8]."</label> </p>";
                echo "</div>";
            }
            echo "<center><input style='margin: 10px;' type='submit' value='Enviar Respostas'></center>";
            echo "</form>";
    }

    private function PesquisarAluno($aluno){//Metodo para pesquisar o aluno no nosso banco de dados
            $this->getAluno()->MontarQuery($aluno);
            $this->getAluno()->FazerConsulta();
    }
	private function PesquisarPerguntas($disci){//Metodo para buscar as perguntas
            $this->getPerg()->MontarQuery($disci);//Passamos de qual diciplina será as perguntas
            $r = $this->getPerg()->FazerConsulta();//Pesquisamos eles no banco dados
            $this->setPerg($this->getPerg()->getPerguntas());//Substituimos o objeto Perg pelas informações sobre cada pergunta
	}
	public function setPerg($resulConsulta){
            $this->perg = $resulConsulta;
	}
	public function setDisciplina($disciplina){
            $this->disciplina = $disciplina;
	}
	public function getPerg(){
            return $this->perg;
	}
	public function getDisciplina(){
            return $this->disciplina;
	}
}



?>