<?php

    $email  = 'emailteste.@.gmail.com';

    // if (filter_var($email , FILTER_VALIDATE_EMAIL) == false) {
    //     echo " Email inválido";
    // }

    // para versões anteriores

    $email = str_replace(" ", '', $email);
    $email = str_replace("/", '', $email);
    $email = str_replace("@.", '@', $email);
    $email = str_replace(".@", '@', $email);
    $email = str_replace(",", '.', $email);
    $email = str_replace(";", '.', $email);

    if (strlen($email) < 8 || substr_count($email , "@") != 1 || substr_count($email , '.') == 0 ) {
        echo "Email inválido";
    }
    else{
        echo " Email válido!";
    }

?>