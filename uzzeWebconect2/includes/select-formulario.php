<?php
// Configurações do banco de dados
$host = 'localhost';
$dbname = 'uzzedb';
$usuario = 'root';
$senha = '';

try {
    // Conexão com o banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query para buscar todos os produtos
    $query = $pdo->query("SELECT * FROM produto");

    // Recupera os resultados da query
    $produtos = $query->fetchAll(PDO::FETCH_ASSOC);

    // Exibe os produtos
    foreach ($produtos as $produto) {
        echo "Nome: " . $produto['nome'] . "<br>";
        echo "Cor: " . $produto['cor'] . "<br>";
        echo "Tamanho: " . $produto['tamanho'] . "<br>";
        echo "Quantidade: " . $produto['quantidade'] . "<br>";
        echo "Valor: " . $produto['valor'] . "<br>";
        echo "Descrição: " . $produto['descricao'] . "<br>";
        
        // Exibe a imagem
        echo '<img src="data:image/jpeg;base64,' . base64_encode($produto['imagem']) . '" alt="Imagem do Produto"><br>';

        echo "<hr>";
    }
} catch (PDOException $e) {
    // Trata possíveis erros de conexão ou query
    echo "Erro: " . $e->getMessage();
}
?>
