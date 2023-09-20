<?php
$category_id = 0; // Substitua pelo ID da categoria desejada

// Construa o URL da API com base no category_id
$apiUrl = "http://localhost/accelerated/api/products";

// Verifica se a categoria é especificada
if (!$category_id) {
    $apiUrl = "http://localhost/accelerated/api/products";
}

// Tente acessar a API
$products = @file_get_contents($apiUrl);

if ($products === FALSE) {
    echo "Erro ao acessar a API.";
} else {
    $products = json_decode($products, true);

    if (isset($products['message'])) {
        echo $products['message'];
    } else {
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
                if (isset($products) && is_array($products)) {
                    foreach ($products as $product) {
                ?>
                            <div class="produtos-container col-md-3">
                                <!-- imagem do produto -->
                                <img src="<?= url($product['image']); ?>" class="img-fluid produto-imagem" alt="PRODUTO SEM IMAGEM !">
                                <!-- itens do produto -->
                                <article class="produtos-itens">
                                    <h2><?= $product['name']; ?></h2>
                                    <h2><?= $product['price']; ?></h2>
                                    <!-- título do produto -->
                                </article>
                                <!-- end itens do produto -->
                            </div>
                <?php
                    }
                } else {
                    echo "Nenhum produto encontrado.";
                }
                ?>
            </section>
            <!-- end produtos -->
        </article>
<?php
    }
}
?>
