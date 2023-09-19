

<?php include __DIR__."/includes/header.php"; ?>

<section class="produtos">
        <?php
            try {

                // Configurações do banco de dados
                $host = 'localhost';
                $dbname = 'uzzedb';
                $usuario = 'root';
                $senha = '';
                // Conexão com o banco de dados usando PDO
                $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $usuario, $senha);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                // Query para buscar todos os produtos da tabela "cadastroproduto"
                $query = $pdo->query("SELECT * FROM produto");
                $produtos = $query->fetchAll(PDO::FETCH_ASSOC);
            
                // Verifica se há produtos cadastrados
                if (count($produtos) > 0) {
                    foreach ($produtos as $produto) {
                        // Recupera a imagem correspondente ao id_img
                        $imagemQuery = "SELECT * FROM imagem WHERE id_img = " . $produto['id_img'];
                        $imagemResult = $pdo->query($imagemQuery);
                        $imagemRow = $imagemResult->fetch(PDO::FETCH_ASSOC);
                        $imagemPath = $imagemRow['path'];
            
                        echo '<div class="product">';
                        echo '<img class="jerseyImgBox" src="' . $imagemPath . '" alt="' . $produto['nome'] . '"/>';
                        echo '<p class="productTitle">' . $produto['nome'] . '</p>';
                        echo '<p class="stars">⭐⭐⭐⭐★</p>';
                        echo '<p class="currency">R$ <span class="price">' . $produto['preco'] . '</span></p>';
                        echo '<button onClick="window.location.href=\'' . $produto['PgVenda'] . '\'" class="productBtn">';
                        echo 'Ver mais';
                        echo '</button>';
                        echo '</div>';
                    }
                } else {
                    echo "Nenhum produto cadastrado.";
                }
            } catch (PDOException $e) {
                // Trata possíveis erros de conexão ou query
                echo "Erro: " . $e->getMessage();
            }
        ?>
    </section>

    <?php include __DIR__."/includes/footer.php"; ?>