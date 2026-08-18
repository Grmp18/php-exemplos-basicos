<?php
// Número escolhido para a tabuada
$numeroInformado = 7;

echo "=== Tabuada do $numeroInformado ===\n";

// Laço de repetição de 1 a 10
for ($multiplicador = 1; $multiplicador <= 10; $multiplicador++) {
    $resultado = $numeroInformado * $multiplicador;
    echo "$numeroInformado x $multiplicador = $resultado\n";
}
?>
