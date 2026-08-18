<?php
// Entrada de dados
$mediaFinal = 7.5;
$quantidadeFaltas = 12;

// Verificação das duas condições simultâneas
if ($mediaFinal >= 6.0 && $quantidadeFaltas <= 15) {
    echo "Situação do aluno: APROVADO!\n";
} else {
    echo "Situação do aluno: REPROVADO.\n";
}
?>
