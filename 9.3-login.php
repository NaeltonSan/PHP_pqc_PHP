<?php
// obtém os valores digitados
$email = $_POST["email"];
$senha = $_POST["senha"];

include "9.1-conecta_mysql.php";

// Escapa os caracteres especiais, para evitar ataques de SQL Injection
$email = $conexao->real_escape_string($email);
$senha = $conexao->real_escape_string($senha);

// acesso ao banco de dados
$resultado = $conexao->query("SELECT * FROM usuarios WHERE email = '$email'");
$linhas = $resultado->num_rows;
// var_dump($linhas); // 1
if($linhas==0)  // testa se a consulta retornou algum registro
{
	echo "<html><body>";
	echo "<p align=\"center\">E-mail não encontrado!</p>";
	echo "<p align=\"center\"><a href=\"9.2-login.html\">Voltar</a></p>";
	echo "</body></html>";
}
else
{
    $dados = $resultado->fetch_array(MYSQLI_ASSOC);
    var_dump($dados);
    echo "<br>";
    $senha_banco = $dados['senha'];
    echo var_dump($senha_banco);
	
   	if ($senha != $senha_banco) // confere senha
	{
		echo "<html><body>";
		echo "<p align=\"center\">A senha está incorreta!</p>";
		echo "<p align=\"center\"><a href=\"9.2-login.html\">Voltar</a></p>";
		echo "</body></html>";
	}
	else   // usuário e senha corretos. Vamos criar os cookies
    {
        setcookie("email_usuario", $email);
        setcookie("senha_usuario", $senha);
        // direciona para a página inicial dos usuários cadastrados
        header ("Location: 9.4-pagina_inicial.php");
    }
}
$conexao->close();
?>