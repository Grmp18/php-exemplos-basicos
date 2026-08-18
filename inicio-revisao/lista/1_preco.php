<?php
// Entrada de dados
$precoProduto = 50.00;
$quantidadeComprada = 5;

// Cálculo do valor total inicial
$valorTotal = $precoProduto * $quantidadeComprada;

// Verificação do desconto
if ($valorTotal >= 200.00) {
    $desconto = $valorTotal * 0.10;
    $valorFinal = $valorTotal - $desconto;
    echo "Valor original: R$ " . number_format($valorTotal, 2, ',', '.') . "\n";
    echo "Desconto aplicado (10%): R$ " . number_format($desconto, 2, ',', '.') . "\n";
} else {
    $valorFinal = $valorTotal;
    echo "Sem direito a desconto.\n";
}

// Exibição do resultado final
echo "Valor final da compra: R$ " . number_format($valorFinal, 2, ',', '.') . "\n";
?>
