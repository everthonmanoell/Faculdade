<form method="POST" action="/processar-formulario">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor">

        <label for="tamanho">Tamanho:</label>
        <input type="text" id="tamanho" name="tamanho">

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1">

        <label for="valor">Valor Unitário:</label>
        <input type="number" id="valor" name="valor" min="0" step="0.01">

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem"><br>
        <div class="btn">
            <input type="submit" value="Cadastrar">

        </div>
    </form>