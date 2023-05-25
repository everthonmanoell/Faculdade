<?php
    include_once ('../conexao/insert.php');
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
</head>

<body>
    <h2>Cadastro</h2>

    <form action="" class="cadastro" id="cadastro" method="post" enctype="multipart/form-data">
        <div class="img">
            <label for="img">Imagem:</label>
            <input type="file" id="img" name="img">
        </div>

        <div class="nome">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>

        <div class="numero">
            <label for="numero">Número:</label>
            <input type="number" id="numero" name="numero" required>
        </div>

        <div class="email">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="cpf">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" required>
        </div>

        <div class="senha">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="senha2">
            <label for="senha2">Repita a senha:</label>
            <input type="password" id="senha2" name="senha2" required>
        </div>

        <div class="btncadastrar">
            <input type="submit" name="cad" id="cadastrar" value="Cadastrar" class="btn">
        </div>

        <div class="btnresetar">
            <input type="reset" name="reset" id="reset" value="Limpar" class="btn2">
        </div>
    </form>

    <footer></footer>
</body>

</html>