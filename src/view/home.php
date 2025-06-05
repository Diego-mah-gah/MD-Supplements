<div class="best-sellers">
        <!-------------------------------- Produtos vão aqui ------------------------------>

        <h2 class="mt-0">Mais vendidos</h2>



    </div>


    <main class="container">

        <?php

        foreach ($produtos as $produto) {
            if ($produto['destaque'] == 'sim') {

                echo "<div class='col-12 col-md-3 text-center' style='display: inline-block; margin: 10px;'>
                    <div class='card' style='margin: 10px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;'>

            <img src='src/imgs/{$produto['imagem']}' alt='{$produto['nome']}' style='width:auto; height:auto;'>
            <h3>{$produto['nome']}</h3>
            <p>R$ " . number_format($produto['preco'], 2, ',', '.') . "</p>
            <form method='post' action='?param=produtos'>
                <input type='hidden' name='produto_nome' value='{$produto['nome']}'>

                <button type='submit' name='add_to_cart' class='btn btn-primary'>Adicionar ao Carrinho</button>
            </form>
        </div>
            </div>";
            }
        }
        ?>

    </main>