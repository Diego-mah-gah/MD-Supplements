    <div class="best-sellers">
        <!-------------------------------- Produtos vão aqui ------------------------------>

        <h2>Mais vendidos</h2>



    </div>


    <main class="container">

        <?php

        foreach ($produtos as $produto) {
            echo "<div class='produto'>";
            echo "<img src='src/imgs/{$produto['imagem']}' alt='{$produto['nome']}' style='height:auto; flex-direction:flex;'>";
            echo "<h3>{$produto['nome']}</h3>";
            echo "<p>R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>";
            echo "<p>{$produto['descricao']}</p>";
            echo "</div>";
        }

        ?>

    </main>