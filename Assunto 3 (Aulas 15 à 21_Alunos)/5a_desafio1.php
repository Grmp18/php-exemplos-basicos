<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $ano_nascimento = $_POST['ano_nascimento'];
    
    // Calcula a idade (Ano atual: 2026)
    $idade = 2026 - $ano_nascimento;

    // Verifica se é maior de idade
    if ($idade >= 18) {
        echo "<h3>Acesso permitido, $nome!</h3>";
        
        // Cria o texto e salva no arquivo txt
        $texto_log = "Nome: $nome | Idade: $idade\n";
        file_put_contents('log_acessos.txt', $texto_log, FILE_APPEND);
    } else {
        echo "<h3>Acesso negado, $nome!</h3>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário PHP</title>
</head>
<body>

    <form method="POST">
        <label>Nome:</label><br>
        <input type="text" name="nome" required><br><br>

        <label>Ano de Nascimento:</label><br>
        <input type="number" name="ano_nascimento" required><br><br>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>
