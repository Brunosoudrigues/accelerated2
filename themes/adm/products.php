<?php
    $this->layout("_theme");
?>




<div class="container">
    <h1>Lista de Produtos</h1>
    <style>
/* Reset de estilos */
body, ul {
    margin: 0;
    padding: 0;
    list-style: none;
}




/* Wrapper */
.wrapper {
    display: flex;
}




/* Barra horizontal fixa */
.navbar {
    background-color: #4336C6;
    color: white;
    padding: 10px 20px;
    width: 100%;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
}




/* Menu lateral */
.sidebar {
    width: 250px;
    background-color: #4336C6;
    color: white;
    padding-top: 40px;
    position: fixed;
    height: 100%;
}




.menu {
    padding: 0;
}




.menu-item {
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}




.menu-item:hover {
    background-color: #5647d2;
}




/* Submenu */
.submenu {
    display: none;
    margin-top: 5px;
    margin-left: 20px;
}




.submenu-item {
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}




.submenu-item:hover {
    background-color: #5647d2;
}




/* Mostrar submenu */
.has-submenu:hover .submenu {
    display: block;
}




/* Área de conteúdo */
.content {
    flex-grow: 1;
    padding: 20px;
    background-color: #f4f4f4;
    margin-left: 250px;
    margin-top: 40px; /* Adicionei para deixar espaço para a barra horizontal fixa */
}




.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}




h1 {
    font-size: 24px;
    text-align: center;
    margin-bottom: 20px;
}




.filter {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}




label {
    font-weight: bold;
}




select, input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}




table {
    width: 100%;
    border-collapse: collapse;
}




table, th, td {
    border: 1px solid #ddd;
}




th, td {
    padding: 12px;
    text-align: left;
}




th {
    background-color: #f2f2f2;
}




tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}




form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}




label,
input,
select,
button {
    margin-bottom: 10px;
    font-size: 16px;
}




button {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}




button:hover {
    background-color: #45a049;
}




/* Adicione estilos para a modal aqui */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
}




.modal-content {
    background-color: #fefefe;
    margin: 10% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

#image-preview {
    text-align: center;
    margin-top: 10px;
  }

  #preview-image {
    max-width: 100%;
    max-height: 200px; /* Defina a altura máxima desejada */
    width: auto;
    height: auto;
  }


.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
table td img {
    max-width: 100%;
    max-height: 100px; /* Altere a altura máxima conforme necessário */
    width: auto;
    height: auto;
}

    </style>
    <div class="filter">
        <label for="category">Categoria:</label>
        <select id="category">
            <option value="">Selecione Categoria</option>
            <?php
                foreach ($categories as $category) {
                    echo "<option value='{$category->id}'>{$category->name}</option>";
                }
            ?>
        </select>
        <label for="nameProduct">Nome do Curso:</label>
        <input type="text" id="nameProduct">
    </div>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Preço</th>
            <th>Imagem</th>
            <th>Apagar</th>
        </tr>
        </thead>
        <tbody id="productList">
       
        </tbody>
    </table>
</div>




<!-- Modal para editar Cursos -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Produto</h2>
        <form id="edit-form">
            <input type="hidden" id="id" name="id">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
            <label for="category_id">Categoria:</label>
            <select id="category_id" name="category_id">
                <option value="">Selecione uma Categoria</option>




                <?php
                foreach ($categories as $category) {
                    echo "<option value='{$category->id}'>{$category->name}</option>";
                }
                ?>




            </select>
            
            <label for="price">Preço:</label>
            <input type="text" id="price" name="price">

            <label for="image">Imagem:</label>
            <input type="text" id="image" name="image">
     
           
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>








<script type="text/javascript">
    const tableProducts = document.querySelector("table");
    const modal = document.querySelector("#edit-modal");
    const closeModalButton = document.querySelector(".close");
    const imageInput = document.querySelector("#image");
    const imagePreview = document.querySelector("#preview-image");

    function openModal() {
        modal.style.display = "block";
    }

    closeModalButton.onclick = function () {
        modal.style.display = "none";
    };

    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    tableProducts.addEventListener("click", (event) => {
        if (event.target.tagName === "TD") {
            const urlGetProduct = "<?= url("api/products/"); ?>" + event.target.parentNode.getAttribute("data-id");
            const optionsGetProduct = {
                method: "get",
            };

            fetch(urlGetProduct, optionsGetProduct)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((product) => {
                    const form = document.querySelector("#edit-form");
                    form.querySelector("#id").value = product[0].id;
                    form.querySelector("#name").value = product[0].name;
                    form.querySelector("#category_id").value = product[0].category_id;
                    form.querySelector("#price").value = product[0].price;
                    form.querySelector("#image").value = product[0].image;
                    openModal();
                })
                .catch((error) => {
                    console.error('Fetch error:', error);
                });
        }

        if (event.target.tagName === "BUTTON") {
            console.log(`Apagar: ${event.target.parentNode.parentNode.getAttribute("data-id")}`);
            // Handle deleteCourse request here
        }
    });

    imageInput.addEventListener("change", () => {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
        }
    });

    const selectCategory = document.querySelector("#category");
    selectCategory.addEventListener("change", async () => {
        const url = "<?= url("api/products/category/"); ?>" + selectCategory.value;
        const response = await fetch(url, {
            method: "get",
        });

        if (!response.ok) {
            console.error(`HTTP error! Status: ${response.status}`);
            return;
        }

        const products = await response.json();
        const listProducts = document.querySelector("#productList");
        listProducts.innerHTML = "";

        products.forEach((product) => {
            const tr = document.createElement("tr");
            tr.setAttribute("data-id", product.id);
            tr.innerHTML = `<td>${product.id}</td><td>${product.name}</td><td>R$ ${product.price}</td><td><img src="<?= url(''); ?>${product.image}" alt="${product.name}"></td><td><button>X</button></td>`;
            listProducts.appendChild(tr);
        });

        const editForm = document.querySelector("#edit-form");
        
        editForm.addEventListener("submit", (event) => {
            event.preventDefault();
            const urlUpdate = "<?= url("api/products"); ?>";
            const optionsUpdate = {
                method: "post",
                body: new FormData(editForm),
            };

            console.log();
            fetch(urlUpdate, optionsUpdate).then((response) => {
                response.text().then((product) => {
                    console.log(product);
                    const tr = document.querySelector(`tr[data-id="${product.id}"]`);
tr.innerHTML = `<td>${product.id}</td><td>${product.name}</td><td>R$ ${product.price}</td><td><button>X</button></td>`;

                });
            });

           /* 

            fetch(urlUpdate, optionsUpdate)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }
                    return response.json();
                })
                .then((product) => {
                    const tr = document.querySelector(`tr[data-id="${product.id}"]`);
                    tr.innerHTML = `<td>${product.id}</td><td>${product.nameproducts}</td><td>R$ ${product.price}</td><td><button>X</button></td>`;

                    if (selectCategory.value != product.category_id) {
                        tr.remove();
                    }

                    modal.style.display = "none";
                })
                .catch((error) => {
                    console.error('Fetch error:', error);
                });

                */
        });

    }); 
</script>