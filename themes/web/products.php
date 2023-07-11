<style>
    /* Estilo para o contêiner de produtos */
    .container.produtos {
        margin-top: 20px;
    }

    /* Estilo para os contêineres de produtos individuais */
    .produtos-container {
        display: block;
        text-decoration: none;
        color: #333;
        margin-bottom: 20px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .produtos-container:hover {
        background-color: #f5f5f5;
    }

    /* Estilo para a imagem do produto */
    .produtos-container img {
        width: 100%;
        height: auto;
        margin-bottom: 10px;
    }

    /* Estilo para os itens do produto */
    .produtos-itens {
        text-align: center;
    }

    .produtos-itens h2 {
        margin-bottom: 5px;
    }
</style>

<?php
    $this->layout("_theme", ["categories" => $categories]);
?>

<!-- listagem dos produtos -->
<article class="row">
    <!-- container produtos -->
    <section class="container produtos">
        <?php 
        foreach ($products as $product) {
        ?>
        <a href="#" class="produtos-container col-md-3">
            <!-- imagem do produto -->
            <img src="./assets/web/images/volante pulse.jpg" class="img-fluid" alt="">
            <!-- itens do produto -->
            <article class="produtos-itens">
                <h2><?= $product->nameproducts; ?></h2>
                <h2><?= $product->price; ?></h2>
                <!-- title produto -->
                <h2><?= $product->name; ?></h2>
            </article>
            <!-- end itens do produto -->
        </a>
        <?php
        }
        ?>
    </section>
    <!-- end produtos -->
</article>
