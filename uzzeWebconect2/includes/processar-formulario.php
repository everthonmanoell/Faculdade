<?php

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os dados do formulário
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Dados do arquivo de imagem
    $imagem = $_FILES['imagem'];
    $imagem_nome = $imagem['name'];
    $imagem_tmp = $imagem['tmp_name'];
    $imagem_tamanho = $imagem['size'];

    // Configurações do banco de dados
    $host = 'localhost';
    $dbname = 'uzzedb';
    $usuario = 'root';
    $senha = '';

    

        // Prepara a query de inserção com parâmetros vinculados
        $query = $pdo->prepare("INSERT INTO produto (nome, cor, tamanho, quantidade, valor, descricao, imagem) VALUES (:nome, :cor, :tamanho, :quantidade, :valor, :descricao, :imagem)");

        // Vincula os parâmetros
        $query->bindParam(':nome', $nome);
        $query->bindParam(':cor', $cor);
        $query->bindParam(':tamanho', $tamanho);
        $query->bindParam(':quantidade', $quantidade);
        $query->bindParam(':valor', $valor);
        $query->bindParam(':descricao', $descricao);
        

        // Lê o conteúdo do arquivo de imagem
        $conteudo_imagem = file_get_contents($imagem_tmp);

        // Vincula o conteúdo da imagem
        $query->bindParam(':imagem', $conteudo_imagem, PDO::PARAM_LOB);

        // Executa a query
        $query->execute();

        // Redireciona para uma página de sucesso ou exibe uma mensagem de sucesso
        //header('Location: /sucesso.html');
        echo "inserido";
        exit();
        
}
?>