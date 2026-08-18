<?php
// Vetor com as notas de 5 alunos
$notasAlunos = [8.5, 6.0, 9.2, 4.5, 7.0];

// Inicialização de variáveis de controle
$somaNotas = 0;
$maiorNota = $notasAlunos[0];
$menorNota = $notasAlunos[0];

// Percorrendo o vetor
foreach ($notasAlunos as $nota) {
    $somaNotas += $nota;

    // Verifica a maior nota
    if ($nota > $maiorNota) {
        $maiorNota = $nota;
    }

    // Verifica a menor nota
    if ($nota < $menorNota) {
        $menorNota = $nota;
    }
}

// Cálculos finais
$totalAlunos = count($notasAlunos);
$mediaTurma = $somaNotas / $totalAlunos;

// Exibição dos resultados
echo "Média da turma: " . number_format($mediaTurma, 1, ',', '.') . "\n";
echo "Maior nota: " . number_format($maiorNota, 1, ',', '.') . "\n";
echo "Menor nota: " . number_format($menorNota, 1, ',', '.') . "\n";
?>
