<?php

$cep = 123456789;

if (strlen($cep) != 8 || !is_numeric($cep)) {
    echo "O CEP deve ser formado por 8 números.";
}

?>