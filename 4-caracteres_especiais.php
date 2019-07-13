<?php

    $texto = "<img src='http://niederauer.com.br/figuras/livros/jovem103.jpg'>";
    $novo_texto = htmlspecialchars($texto);

    echo $texto . "<br>";
    echo $novo_texto;

    echo "<hr>";

    $email = "john(.doe)@exa//mple.com";
    // $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    echo $email;
    echo "<br>";
    $number="5-2+3pp";

    $numero_filtrado =  filter_var($number, FILTER_SANITIZE_NUMBER_INT);
    echo $numero_filtrado;
    echo "<hr>";

    if (filter_var($email , FILTER_VALIDATE_EMAIL) == false){
        echo " O e-mail digitado é inválido!";
    }

    


?>

