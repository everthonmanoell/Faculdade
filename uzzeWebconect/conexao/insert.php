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
    $img = $_POST['img'];
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];

    try {
        $stmt = $conn->prepare("INSERT INTO consumidor (img, nome, numero, email, cpf, senha) VALUES (:img, :nome, :numero, :email, :cpf, :senha)");
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        echo "Data inserted successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>