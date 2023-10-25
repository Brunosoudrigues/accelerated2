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
<input type="file" id="image" name="image">
<div id="image-preview">
    <img id="preview-image" src="" alt="Imagem do Produto">
</div>


           
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>








<script type="text/javascript">




const tableProducts = document.querySelector("table");
    // Seletor para a modal
    const modal = document.querySelector("#edit-modal");
    // Seletor para o botão de fechar a modal
    const closeModalButton = document.querySelector(".close");
    const imageInput = document.querySelector("#image");
const imagePreview = document.querySelector("#preview-image");




    // Função para abrir a modal com dados do produto (vai receber por parâmetro o id do produto)
    function openModal() {
        modal.style.display = "block";
    }




    // Fechar a modal ao clicar no botão de fechar
    closeModalButton.onclick = function() {
        modal.style.display = "none";
    };




    // Fechar a modal quando o usuário clicar fora dela
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };




    // Função para carregar os dados do produto na modal




    tableProducts.addEventListener("click", (event) => {




        if(event.target.tagName === "TD"){
            console.log(event.target.parentNode);




            console.log(`Mostrar: ${event.target.parentNode.getAttribute("data-id")}`);
            // Requisição para getCourse
            const urlGetProduct = "<?= url("api/products/"); ?>" + event.target.parentNode.getAttribute("data-id");
            const optionsGetProduct = {
                method : "get"
            };
            fetch(urlGetProduct, optionsGetProduct).then((response) => {
                response.json().then((product) => {
                    // carregar os dados no formulário
                    // console.log(book[0]);
                    const form = document.querySelector("#edit-form");
                    form.querySelector("#id").value = product[0].id;
                    form.querySelector("#name").value = product[0].nameproducts;
                    form.querySelector("#category_id").value = product[0].category_id;
                    form.querySelector("#price").value = product[0].price;
                    
                });
            });
            openModal();
        }




        if(event.target.tagName === "BUTTON"){
            console.log(`Apagar: ${event.target.parentNode.parentNode.getAttribute("data-id")}`);
            // Requisisão para deleteCourse
            //event.target.parentNode.parentNode.remove();
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
        imagePreview.src = ""; // Limpar a imagem se nenhum arquivo for selecionado
    }
});





    const selectCategory = document.querySelector("#category");
    selectCategory.addEventListener("change",  async () => {
        console.log(selectCategory.value);
        const url = "<?= url("api/products/category/"); ?>" + selectCategory.value;
        const response = await fetch(url, {
            method : "get"
        });
        const products = await response.json();
        console.log(products);
        const listProducts = document.querySelector("#productList");
        listProducts.innerHTML = "";
        products.forEach((product) => {
            console.log(product.name);
            const tr = document.createElement("tr");
            tr.setAttribute("data-id",product.id);
            tr.innerHTML = `<td>${product.id}</td><td>${product.nameproducts}</td><td>R$ ${product.price}</td><td><img src="<?= url(''); ?>${product.image}" alt="${product.name}"></td><td><button>X</button></td>`;
            listProducts.appendChild(tr);
        });
    });
</script>





