<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Clientes</h1>
        <form method="post" action="clients?action=store">
            <input type="hidden" name="id" id="client-id">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="address">Endereço</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?php echo $client['id']; ?></td>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['cpf']; ?></td>
                    <td><?php echo $client['address']; ?></td>
                    <td>
                        <a href="javascript:void(0)" onclick="editClient(<?php echo htmlspecialchars(json_encode($client)); ?>)" class="btn btn-sm btn-warning">Editar</a>
                        <a href="clients?action=destroy&delete=<?php echo $client['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function editClient(client) {
            document.getElementById('client-id').value = client.id;
            document.getElementById('name').value = client.name;
            document.getElementById('cpf').value = client.cpf;
            document.getElementById('address').value = client.address;
            document.querySelector('form').action = 'clients?action=update';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
