<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Categorizados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .btn-insert {
            background-color: #3498db;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .btn-insert:hover {
            background-color: #2980b9;
        }

        .products {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }

        .product-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(33.33% - 10px);
            display: inline-block;
            margin-right: 10px;
            vertical-align: top;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }

        .product-item:last-child {
            margin-right: 0;
        }

        .product-image {
            width: 200px; /* Largura fixa */
            height: 200px; /* Altura fixa */
            object-fit: cover; /* Manter proporção e preencher o espaço */
            border-radius: 5px;
        }

        .product-name {
            font-size: 18px;
            color: #333;
            font-weight: bold;
            margin-bottom: 5px;
            font-family: 'Arial', sans-serif;
        }

        .product-price {
            font-size: 16px;
            color: #e74c3c;
            font-weight: bold;
            font-family: 'Arial', sans-serif;
        }
    </style>
</head>
<body>
    <button class="btn-insert" id="btnCategoriaAromatizador">Exibir Categoria Aromatizador</button>
    <button class="btn-insert" id="btnCategoriaVolante">Exibir Categoria Volante</button>
    <button class="btn-insert" id="btnCategoriaPneu">Exibir Categoria Pneu</button>

    <div class="products">
        <h2>Produtos</h2>
        <div id="divProducts"></div>
    </div>

    <script type="module">
        async function displayProducts(url) {
            try {
                const response = await fetch(url);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const products = await response.json();
                const divProducts = document.getElementById('divProducts');
                divProducts.innerHTML = '';

                products.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.classList.add('product-item');

                    const productName = document.createElement('p');
                    productName.textContent = `${product.nameproducts} - R$ ${product.price}`;

                    const productImage = document.createElement('img');
                    productImage.src = product.image;
                    productImage.alt = product.name;
                    productImage.classList.add('product-image');

                    productElement.appendChild(productName);
                    productElement.appendChild(productImage);

                    divProducts.appendChild(productElement);
                });
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }

        const urlProductAromatizador = "<?php echo url('api/products'); ?>";
        displayProducts(urlProductAromatizador);


        const btnCategoriaAromatizador = document.getElementById('btnCategoriaAromatizador');
        btnCategoriaAromatizador.addEventListener('click', () => {
            const urlProductAromatizador = "<?php echo url('api/products/category/3'); ?>";
            displayProducts(urlProductAromatizador);
        });

        const btnCategoriaVolante = document.getElementById('btnCategoriaVolante');
        btnCategoriaVolante.addEventListener('click', () => {
            const urlProductVolante = "<?php echo url('api/products/category/2'); ?>";
            displayProducts(urlProductVolante);
        });

        const btnCategoriaPneu = document.getElementById('btnCategoriaPneu');
        btnCategoriaPneu.addEventListener('click', () => {
            const urlProductPneu = "<?php echo url('api/products/category/1'); ?>";
            displayProducts(urlProductPneu);
        });
    </script>
</body>
</html>
