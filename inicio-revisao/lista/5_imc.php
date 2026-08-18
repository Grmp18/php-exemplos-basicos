<?php
// Declaração da função para calcular o IMC
function calcularIMC($peso, $altura) {
    // Fórmula: peso dividido pela altura ao quadrado
    $imc = $peso / ($altura * $altura);
    return $imc;
}

// Programa Principal - Valores de teste
$pesoTeste = 75.0;  // em quilos
$alturaTeste = 1.75; // em metros

// Chamada da função
$imcCalculado = calcularIMC($pesoTeste, $alturaTeste);

// Exibição do IMC formatado
echo "IMC Calculado: " . number_format($imcCalculado, 2, ',', '.') . "\n";

// Estrutura condicional para classificação (Tabela padrão da OMS)
if ($imcCalculado < 18.5) {
    $classificacao = "Abaixo do peso";
} elseif ($imcCalculado >= 18.5 && $imcCalculado < 25.0) {
    $classificacao = "Peso normal";
} elseif ($imcCalculado >= 25.0 && $imcCalculado < 30.0) {
    $classificacao = "Sobrepeso";
} else {
    $classificacao = "Obesidade";
}

echo "Classificação: $classificacao\n";
?>
