<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name='charset' content="UTF-8" />
        <meta name='viewport' content="width=device-width, initial-scale=1" />
        <title>Treinador ADS</title>
        <link rel="shortcut icon" href="img/logo.ico">
        <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css' />
        <?php 
            $aluno = isset($_POST['nome'])? $_POST['nome'] : "Anonimo";
        ?>
        <style type="text/css">
            body{
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-image: url("https://colaboraread.com.br/assets/conexao-98b81995c6e6485c3bc8635e2a72cc1b.jpg");
            }
            .formulario{
                background-color: rgba(182,183,188, 0.8);
                padding: 20px;
                margin-top: 7%;
                margin-left: 15%;
                border-radius: 15px;  
                box-shadow: 0px 2px 5px rgba(0,0,0, 0.8);
            }
            input{
                border-radius: 7px;
            }
            input.nome{
                background-color: rgb(255,255,255);
                width: 290px;
            }
            input.submit{
                background-color: rgb(0,0,0,0.8);
                padding: 5px;
                color: rgb(255,255,255);
                font-size: 13pt;
                font-weight: 600;
            }
            p.pergunta{
                font-size: 18px;
                font-family: arial;
            }
            p.links{
                font-size: 15px;
                font-weight: 800;
            }
            span{
                font-size: 15px;
                font-weight: 400;
            }
        </style>
    </head>
    <body>
		<div class="container">
			<div class='row'>
                <div class='col-md-4 col-sm-6 col-xs-12 formulario'>
                    <?php
                        echo "De qual disciplina quem responder as perguntas</p>";
                        echo "<p class='links'><a href='html/Pergunta/?disc=1'>Logica Computacional</a></p>
                            <p class='links'><a href='html/Pergunta/?disc=2'>Modelagem de Dados</a></p>
                            <p class='links'><a href='html/Pergunta/?disc=3'>Analise  e Modelagem de Sistemas</a></p>
                            <p class='links'><a href='html/Pergunta/?disc=4'>Algoritmos e Programação Estruturada</a></p>";
                    ?>
                </div>
		    </div>
        </div>
        
        <script src='js/bootstrap.min.js'/></script>
        <script src='js/jquery.min.js'/></script>
    </body>
</html>
