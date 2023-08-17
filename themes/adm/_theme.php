

<!DOCTYPE html>
<html>
<head>
    <title>Área Administrativa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #header {
            background-color: #ffc107;
            display: flex;
            align-items: center;
            padding: 10px;
        }
        #logo {
            width: 100px;
            height: 100px;
            margin-right: 10px;
        }
        #tabs {
            background-color: #ffc107;
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }
        #tabs li {
            flex: 1;
            text-align: center;
            padding: 10px;
            cursor: pointer;
        }
        #tabs li:hover {
            background-color: #ffca28;
        }
        .content {
            background-color: #ffc107;
            padding: 20px;
            display: none;
        }
    </style>
</head>
<body>
    <div id="header">
        <img id="logo" src="<?= url("./assets/web/images/logoautopeças-removebg-preview.png")?>" alt="Logo da Empresa">
        <h1>Área Administrativa</h1>
    </div>

    <ul id="tabs">
        <li onclick="showTab('content-cadastro-cliente')">Clientes</li>
        <li onclick="showTab('content-cadastro-produto')">Produtos</li>
        <li onclick="showTab('content-relatorio')">Geração de Relatórios</li>
        <li onclick="showTab('content-faq')">Resposta do FAQ</li>
    </ul>

    <div class="content" id="content-cadastro-cliente">
    <a href="<?= url("/admin/listaclientes")?>">
               Clientes cadastrados
              </a><br>
              <a href="<?= url("/admin/cadastrocliente")?>">
            cadastrar clientes
              </a><br>
              <a href="<?= url("/admin/alteracaocliente")?>">
              alterar dados 
              </a><br>
              <a href="<?= url("/admin")?>">
          excluir usuario
              </a>
            </li>
    </div>

    <div class="content" id="content-cadastro-produto">
        <!-- Formulário de cadastro de produtos -->
        <a href="<?= url("/admin/listaprodutos")?>">
               Produtos cadastrados
              </a><br>
              <a href="<?= url("/admin/cadastroproduto")?>">
            cadastrar Produtos
              </a><br>
              <a href="<?= url("/admin/alteracaoproduto")?>">
              alterar Produtos
              </a><br>
              <a href="<?= url("/admin")?>">
          excluir Produtos
              </a>
            </li>
    </div>

    <div class="content" id="content-relatorio">
        <!-- Formulário de geração de relatório -->
        <a href="<?= url("/admin")?>">
         Relatorio de vendas 
              </a><br>
              <a href="<?= url("/admin")?>">
       Relatorio produtos 
              </a><br>
              <a href="<?= url("/admin")?>">
  Relatorio clientes 
              </a><br>
            
            </li>
    </div>

    <div class="content" id="content-faq">
    <a href="<?= url("/admin/faq")?>">
Entrar
              </a><br>
    </div>

    <?php echo $this->section("content"); ?>

    <script>
        function showTab(tabId) {
            const contents = document.querySelectorAll('.content');
            contents.forEach(content => {
                content.style.display = 'none';
            });

            const selectedContent = document.getElementById(tabId);
            selectedContent.style.display = 'block';
        }
    </script>


</body>
</html>
