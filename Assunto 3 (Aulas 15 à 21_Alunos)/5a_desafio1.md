<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Maioridade</title>
    <style>
    body { font-family: Arial, sans-serif; margin: 40px; background-color: #f4f4f9; }
        .container { max-width: 400px; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .campo { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background-color: #007BFF; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        button:hover { background-color: #0056b3; }
        .alerta { padding: 10px; margin-top: 15px; border-radius: 4px; font-weight: bold; }
        .sucesso { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .erro { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
    </style>
</head>
<body>

<div class="container">
    <h2>Verificador de Maioridade</h2>
    
    <!-- Formulário que envia os dados para a própria página (Method POST) -->
    <form action="" method="POST">
        <div class="campo">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">
        </div>
        <div class="campo">
            <label for="ano_nascimento">Ano de Nascimento:</label>
            <input type="number" id="ano_nascimento" name="ano_nascimento" min="1900" max="<?php echo date('Y'); ?>" required placeholder="Ex: 2000">
        </div>
        <button type="submit" name="verificar">Verificar Acesso</button>
    </form>

    <?php
    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verificar'])) {
        // Sanitização simples das entradas
        $nome = htmlspecialchars(trim($_POST['nome']));
        $ano_nascimento = intval($_POST['ano_nascimento']);
        
        // Calcula a idade com base no ano atual do servidor
        $ano_atual = intval(date('Y'));
        $idade = $ano_atual - $ano_nascimento;

        // Regra de negócio: Verifica se é maior de idade
        if ($idade >= 18) {
            echo "<div class='alerta sucesso'>Acesso permitido, $nome!</div>";
            
            // Formata a linha que será salva no log
            // Exemplo: [2026-09-15 20:22:00] Nome: João | Idade: 25 anos
            $linha_log = "[" . date('Y-m-d H:i:s') . "] Nome: $nome | Idade: $idade anos" . PHP_EOL;
            
            // Salva no arquivo log_acessos.txt (o parâmetro FILE_APPEND evita que apague o conteúdo anterior)
            file_put_contents('log_acessos.txt', $linha_log, FILE_APPEND);
        } else {
            echo "<div class='alerta erro'>Acesso negado, $nome!</div>";
        }
    }
    ?>
</div>