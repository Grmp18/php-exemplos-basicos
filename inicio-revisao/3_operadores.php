<?php

//criando variaveis
$idade = 19;
$temDocumento = false;

// Estrutura de decisão (Operador E)
if ($idade >= 18 && $temDocumento) {
    echo "pode tirar a carteira";
} else {
    echo "não pode tirar carteira";
}

// Estrutura de decisão (operador OU)
if ($idade >= 18 || $temDocumento) {
    echo "\npode tirar a carteira";
} else {
    echo "não pode tirar a carteira";
}

//operador negação |

$presente = false;

if (! $presente) {
    echo "\nO aluno está presente";
} else {
    echo "\nO aluno está ausente";
}