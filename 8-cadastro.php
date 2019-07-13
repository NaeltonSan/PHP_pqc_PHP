<?php

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $confirmacao = $_POST['confirmacao'];

    // elimina erros mais comuns na digitacao 
    $email = str_replace(" ", '', $email);
    $email = str_replace("/", '', $email);
    $email = str_replace("@.", '@', $email);
    $email = str_replace(".@", '@', $email);
    $email = str_replace(",", '.', $email);
    $email = str_replace(";", '.', $email);
    $erro = 0;

    //verifica nome
    if (empty($nome)) {
        $erro = 1;
        $msg = "Por farvor , digite eu nome corretamente.";
    }
    //verifica email
    elseif (strlen($email) < 8 || substr_count($email , "@") != 1 || substr_count($email , '.') == 0 )  {  
        $erro = 1;
        $msg = "Por farvor digite seu email corretamente.";
    }

    //verifica estado
    elseif (strlen($estado) != 2) {
        $erro = 1;
        $msg = "Por Farvor, escolha seu estado.";
    }

    //verifica login
    elseif (strlen($login) < 5 ||  strlen($login > 15)) {
        $erro = 1;
        $msg = "O nome de usuário (login) deve ter entre 5 e 15 caracteres.";
    }

    elseif (strstr ($login , ' ') != false) {
        $erro = 1 ;
        $msg = " O nome de usuário (login) não pode conter espaços em branco.";
    }

    //verifica senha
    elseif (strlen($senha) <5 || strlen($senha) > 15) {
        $erro = 1;
        $msg = "A senha deve ter entre 5 e 15 caracteres.";
    }
    elseif (strstr ($senha , ' ') != false) {
        $erro = 1 ;
        $msg = " A senha não pode conter espaços em branco.";
    }

    //compara senha e confirmação de senha
    elseif ($senha != $confirmacao) {
        $erro = 1 ;
        $msg = " Voçê digitiou dua senhas diferentes.";
    }

    //se ocorreu erro, exiba a mensagem de erro
    if ($erro) {
        echo "<html><body>";
        echo "<p align=center> $msg</p>";
        echo "<p align=center><a href ='javascript:history.back()'>Voltar<a/></p>";
        echo "</body></html>";
    }
    else {
        //tratar os dados aqui, ex: gravar no banco de dados
        echo "<html><body>";
        echo "<p align=center>Cadastro realizado com sucesso!</p>";
        echo "</body></html>";
    }

?>