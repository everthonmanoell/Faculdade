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

    // Consulta os dados do último registro inserido
    $queryUltimoRegistro = $pdo->query("SELECT * FROM produto ORDER BY id DESC LIMIT 1");
    $ultimoProduto = $queryUltimoRegistro->fetch(PDO::FETCH_ASSOC);

    // Preenche as informações do último registro nos campos do formulário
    $ultimoNome = $ultimoProduto['nome'];
    $ultimoCor = $ultimoProduto['cor'];
    $ultimoTamanho = $ultimoProduto['tamanho'];
    $ultimoQuantidade = $ultimoProduto['quantidade'];
    $ultimoValor = $ultimoProduto['valor'];
    $ultimaDescricao = $ultimoProduto['descricao'];

   

    // Exibe os produtos
    foreach ($produtos as $produto) {
        echo '<div class="product-card">';
        echo '<img src="data:image/jpeg;base64,' . base64_encode($produto['imagem']) . '" alt="' . $produto['nome'] . '">';
        echo '<h3>' . $produto['nome'] . '</h3>';
        echo '<p>Cor: ' . $produto['cor'] . '</p>';
        echo '<p>Tamanho: ' . $produto['tamanho'] . '</p>';
        echo '<p>Quantidade: ';
	    echo '<p>Quantidade: ' . $produto['quantidade'] . '</p>';
        echo '<p>Valor: R$ ' . number_format($produto['valor'], 2) . '</p>';
        echo '<p>' . $produto['descricao'] . '</p>';
        echo '</div>';
    }
} catch (PDOException $e) {
    // Trata possíveis erros de conexão ou query
    echo "Erro: " . $e->getMessage();
}
?>