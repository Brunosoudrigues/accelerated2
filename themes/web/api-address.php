<!DOCTYPE html>
<html>
<head>
    <title>Display Addresses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            font-size: 24px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Addresses</h1>

<li class="nav-item">
              <a href="<?= url("/api-login")?>">voltar</a>
            </li>
<table border="1">
    <thead>
        <tr>
            <th>Street</th>
            <th>Number</th>
            <th>Complement</th>
            <th>User ID</th>
        </tr>
    </thead>
    <tbody id="addresses-table">
        <!-- As informações de endereço serão exibidas aqui -->
    </tbody>
</table>

<script>
    // Função para fazer a requisição à API de endereços
    function fetchAddresses() {
        fetch('http://localhost/accelerated/api/addresses')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na requisição da API');
                }
                return response.json();
            })
            .then(data => {
                const addressesTable = document.getElementById('addresses-table');
                addressesTable.innerHTML = ''; // Limpa a tabela de endereços

                // Itera sobre os endereços e os adiciona à tabela
                data.forEach(address => {
                    const row = addressesTable.insertRow();
                    const cell1 = row.insertCell(0);
                    const cell2 = row.insertCell(1);
                    const cell3 = row.insertCell(2);
                    const cell4 = row.insertCell(3);
                    cell1.innerHTML = address.street;
                    cell2.innerHTML = address.number;
                    cell3.innerHTML = address.complement;
                    cell4.innerHTML = address.user_id;
                });
            })
            .catch(error => console.error('Erro ao obter os endereços:', error));
    }

    // Chama a função para buscar os endereços ao carregar a página
    fetchAddresses();
</script>

</body>
</html>
