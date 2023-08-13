<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho de Compras</title>
<style>
  /* Reset de estilos para garantir consistência em diferentes navegadores */
  body, h1, h2, h3, p, ul, li, table, td {
    margin: 0;
    padding: 0;
    border: 0;
  }

  /* Estilo para o cabeçalho */
  header {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
    text-align: center;
  }

  /* Estilo para o título do carrinho */
  .page-title {
    font-size: 24px;
    font-weight: bold;
    margin-top: 20px;
  }

  /* Estilo para a seção principal */
  .main {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    margin-top: 20px;
  }

  /* Estilo para a tabela de produtos no carrinho */
  table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
    margin-bottom: 20px;
  }

  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f4f4f4;
  }

  /* Estilo para os botões de quantidade */
  .qty {
    display: flex;
    align-items: center;
  }

  .qty button {
    background-color: transparent;
    border: none;
    cursor: pointer;
  }

  /* Estilo para o botão de remover produto */
  .remove button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    color: #ff4a4a;
  }

  /* Estilo para a seção de resumo da compra */
  .box {
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 4px;
    margin-bottom: 20px;
  }

  .box header {
    font-weight: bold;
  }

  .box .info {
    margin-top: 10px;
  }

  .box .info div {
    display: flex;
    justify-content: space-between;
    margin-bottom: 5px;
  }

  .box button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
  }

  /* Estilo para o botão de finalizar compra */
  aside button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
  }
</style>
<link
  href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
  rel="stylesheet"
/>
</head>
<body>
  <header>
    <span><b>Carrinho de compras</b></span>
  </header>
  <main>
    <div class="page-title">Seu Carrinho</div>
    <div class="content">
      <section>
        <table>
          <thead>
            <tr>
              <th>Produto</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th>Total</th>
              <th>-</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="product">
                  <img src="https://picsum.photos/100/120" alt="" />
                  <div class="info">
                    <div class="name">Nome do produto</div>
                    <div class="category">Categoria</div>
                  </div>
                </div>
              </td>
              <td>R$ 120</td>
              <td>
                <div class="qty">
                  <button><i class="bx bx-minus"></i></button>
                  <span>2</span>
                  <button><i class="bx bx-plus"></i></button>
                </div>
              </td>
              <td>R$ 240</td>
              <td>
                <button class="remove"><i class="bx bx-x"></i></button>
              </td>
            </tr>
            <!-- Outras linhas da tabela -->
          </tbody>
        </table>
      </section>
      <aside>
        <div class="box">
          <header>Resumo da compra</header>
          <div class="info">
            <div><span>Sub-total</span><span>R$ 418</span></div>
            <div><span>Frete</span><span>Gratuito</span></div>
            <div>
              <button>
                Adicionar cupom de desconto
                <i class="bx bx-right-arrow-alt"></i>
              </button>
            </div>
          </div>
          <footer>
            <span>Total</span>
            <span>R$ 418</span>
          </footer>
        </div>
        <button>Finalizar Compra</button>
      </aside>
    </div>
  </main>
</body>
</html>
