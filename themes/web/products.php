<?php
$this->layout("_theme", [
    "categories" => isset($categories) ? $categories : []
]);
?>
    <h1 class="text-center">Nossos produtos</h1>

<!-- listagem dos produtos -->
<article class="row">
    <!-- container produtos -->
    <section class="container produtos">
        <?php 
        foreach ($products as $product) {
        ?>
        <a href="#" class="produtos-container col-md-3">
            <!-- imagem do produto -->
            <img src="<?= url($product->image); ?>" class="img-fluid produto-imagem" alt="PRODUTO SEM IMAGEM !">
            <!-- itens do produto -->
            <article class="produtos-itens">
                <h2><?= $product->nameproducts; ?></h2>
                <h2><?= $product->price; ?></h2>
                <!-- título do produto -->
            </article>
            <!-- end itens do produto -->
        </a>
        <?php
        }
        ?>
    </section>
    <!-- end produtos -->
</article>

<style>
    .produto-imagem {
        width: 25%; /* Altere o valor da largura conforme desejado */
        height: auto;
    }
</style>

