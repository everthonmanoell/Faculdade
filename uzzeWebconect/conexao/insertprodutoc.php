<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uzzebd";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['cad'])) {
    $img = $_FILES['img']['name'];
    echo $img;
    $nome = $_POST['nome'];
    $cor = $_POST['cor'];
    $tamanho = $_POST['tamanho'];
    $quantidade = $_POST['quantidade'];
    $valor_uni = $_POST['valor_uni'];
    $descricao = $_POST['descricao'];
    
    echo $img;

    try {
        $stmt = $conn->prepare("INSERT INTO produto (img, nome, cor, tamanho, quantidade, valor_uni, descricao) VALUES (:img, :nome, :cor, :tamanho, :quantidade, :valor_uni, :descricao)");
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cor', $cor);
        $stmt->bindParam(':tamanho', $tamanho);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->bindParam(':valor_uni', $valor_uni);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->execute();

        echo "Data inserted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>