<?php
// Configurações do Banco de Dados
$host = 'localhost';
$dbname = 'exercicio';
$username = 'root'; // ajuste se o seu usuário for diferente
$password = 'Senai@118';     // ajuste se a sua senha for diferente

$mensagem = "";
$tipo_mensagem = ""; // 'sucesso' ou 'erro'

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta e limpa os dados do formulário
    $nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
    $preco = isset($_POST['preco']) ? trim($_POST['preco']) : '';

    // 2. Validação dos Dados
    if (empty($nome)) {
        $mensagem = "Erro: O nome do produto não pode estar vazio.";
        $tipo_mensagem = "erro";
    } elseif (!is_numeric($preco) || $preco <= 0) {
        $mensagem = "Erro: O preço deve ser um número maior que zero.";
        $tipo_mensagem = "erro";
    } else {
        // Se passou na validação, tenta inserir no banco de dados
        try {
            // Conexão com o banco usando PDO
            $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepara a query SQL para evitar SQL Injection
            $sql = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)";
            $stmt = $pdo->prepare($sql);

            // Vincula os parâmetros e executa
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();

            
            echo "<p style='color: Darkgreen;'>Produto cadastrado com sucesso!</p>";
            $tipo_mensagem = "sucesso";
            
            // Limpa os campos para o formulário ficar em branco após o sucesso
            $nome = $preco = "";


        }
         catch (PDOException $e) {
            $mensagem = "Erro ao conectar ao banco de dados: " . $e->getMessage();
            $tipo_mensagem = "erro";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>

<div class="container">
    <h2>Cadastrar Produto</h2>

    <!-- Exibe a mensagem de sucesso ou erro se houver -->
    <?php if (!empty($mensagem)): ?>
        <div class="alert <?= $tipo_mensagem ?>">
            <?= htmlspecialchars($mensagem) ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="nome">Nome do Produto:</label>
            <input type="text" id="nome" name="nome" value="<?= isset($nome) ? htmlspecialchars($nome) : '' ?>">
        </div>

        <div class="form-group">
            <label for="preco">Preço (R$):</label>
            <!-- O atributo step="0.01" permite números decimais no HTML5 -->
            <input type="number" id="preco" name="preco" step="0.01" value="<?= isset($preco) ? htmlspecialchars($preco) : '' ?>">
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>