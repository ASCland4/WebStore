<div class="container espaco-fundo">

    <!-- titulo da página -->
    <div class="row">
        <div class="col-12 text-center my-4">

            <a href="?a=loja&c=todos" class="btn btn-primary">Todos</a>
            <?php foreach ($categorias as $categoria) : ?>
            <a href="?a=loja&c=<?= $categoria ?>" class="btn btn-primary">
                <?= ucfirst(preg_replace("/\_/", " ", $categoria)) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- produtos -->
    <div class="row">

        <?php if (count($produtos) == '0') : ?>
        <div class="text-center my-5">
            <h3>Não existem produtos disponíveis.</h3>
        </div>
        <?php else : ?>

        <!-- ciclo de apresentação dos produtos -->
        <?php foreach ($produtos as $produto) : ?>
        <div class="col-sm-4 col-6 p-2">

            <div class="text-center p-3 box-produto">
                <img src="assets/images/produtos/<?= $produto->imagem ?>" class="img-fluid">
                <h3><?= $produto->nome_produto ?></h3>
                <h2><?= preg_replace("/\./", ",", $produto->preco) . '$' ?></h2>
                <div>
                    <?php if ($produto->stock > 0) : ?>
                    <button class="btn btn-info btn-sm" onclick="adicionar_carrinho(<?= $produto->id_produto ?>)">
                        <i class="fas fa-shopping-cart me-2"></i>Adicionar ao carrinho</button>
                    <?php else : ?>
                    <button class="btn btn-danger btn-sm">
                        <i class="fas fa-shopping-cart me-2"></i>Sem stock</button>
                    <?php endif; ?>
                </div>
            </div>

        </div>
        <?php endforeach; ?>

        <?php endif ?>

    </div>
</div>

<!-- 

[id_produto] => 1
[categoria] => homem
[nome_produto] => Tshirt Vermelha
[descricao] => Ab laborum, commodi aspernatur, quas distinctio cum quae omnis autem ea, odit sint quisquam similique! Labore aliquam amet veniam ad fugiat optio.
[imagem] => tshirt_vermelha.png
[preco] => 45.70
[stock] => 100
[visivel] => 1
[created_at] => 2021-02-06 19:45:18
[updated_at] => 2021-02-06 19:45:25
[deleted_at] => 

 -->