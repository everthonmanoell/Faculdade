<?php include __DIR__."/includes/select-formulario.php"; ?>

<?php include __DIR__."/includes/header.php"; ?>

<section>
        <?php
            // Simulação dos dados do banco de dados
            $products = array(
                array(
                    'nome' => 'Produto 1',
                    'cor' => 'Azul',
                    'tamanho' => 'M',
                    'quantidade' => 10,
                    'valor' => 29.99,
                    'descricao' => 'Descrição do Produto 1',
                    'imagem' => 'https://picsum.photos/200'
                ),
                array(
                    'nome' => 'Produto 2',
                    'cor' => 'Vermelho',
                    'tamanho' => 'G',
                    'quantidade' => 5,
                    'valor' => 39.99,
                    'descricao' => 'Descrição do Produto 2',
                    'imagem' => 'https://picsum.photos/200'
                ),
                // Adicione mais produtos conforme necessário
            );

            // Exibição dos cards de produtos
            foreach ($products as $product) {
                echo '<div class="product-card">';
                echo '<img src="' . $product['imagem'] . '" alt="' . $product['nome'] . '">';
                echo '<h3>' . $product['nome'] . '</h3>';
                echo '<p>Cor: ' . $product['cor'] . '</p>';
                echo '<p>Tamanho: ' . $product['tamanho'] . '</p>';
                echo '<p>Quantidade: ' . $product['quantidade'] . '</p>';
                echo '<p>Valor: R$ ' . number_format($product['valor'], 2) . '</p>';
                echo '<p>' . $product['descricao'] . '</p>';
                echo '</div>';
            }
        ?>
    </section>

    <?php include __DIR__."/includes/footer.php"; ?>