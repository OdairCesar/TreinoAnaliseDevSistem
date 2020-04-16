<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name='charset' content="UTF-8" />
        <link rel="shortcut icon" href="../../img/logo.ico">
        <meta name='viewport' content="width=device-width, initial-scale=1" />
        <title>Treinador ADS</title>
        <link href='../../css/bootstrap.min.css' rel='stylesheet' type='text/css' />
        <link href='../../css/pagina-perg.css' rel='stylesheet' type='text/css' />
         <?php
            require_once '../../class/Pergunta.php';
            $disc = $_GET['disc'];
            $logicaComputer = new Pergunta($disc);
            $res[0] = isset($_POST['resposta0'])? $_POST['resposta0']: false;
            $res[1] = isset($_POST['resposta1'])? $_POST['resposta1']: false;
            $res[2] = isset($_POST['resposta2'])? $_POST['resposta2']: false;
            $res[3] = isset($_POST['resposta3'])? $_POST['resposta3']: false;
            $res[4] = isset($_POST['resposta4'])? $_POST['resposta4']: false;
            $res[5] = isset($_POST['resposta5'])? $_POST['resposta5']: false;
            $res[6] = isset($_POST['resposta6'])? $_POST['resposta6']: false;
            $res[7] = isset($_POST['resposta7'])? $_POST['resposta7']: false;
            $res[8] = isset($_POST['resposta8'])? $_POST['resposta8']: false;
            $res[9] = isset($_POST['resposta9'])? $_POST['resposta9']: false;

        ?>
    </head>
    <body>
        <div class="container">
            <div class='row'>
                <?php
                    if(empty($res[0])){
                        if (!($logicaComputer->getPerg() == null)){
                            $logicaComputer->MontarPerguntas();
                        }
                        else{
                            echo "<H1>Não foi encontrado nenhuma pergunta. Tente mais tarde</H1>";
                        }
                    }else{
                        $logicaComputer->MontarPerguntasComResp($res);
                    }
                ?>
            </div>
        </div>
        
        <script src='../../js/bootstrap.min.js'/></script>
        <script src='../../js/jquery.min.js'/></script>
    </body>
</html>
