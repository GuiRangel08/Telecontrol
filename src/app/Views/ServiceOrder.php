<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Ordem de Serviço</h1>
        <form method="post" action="../orders?action=store">
            <input type="hidden" name="order_id" id="order_id">
            <div class="form-group">
                <label for="order_number">Número da Ordem</label>
                <input type="number" class="form-control" id="order_number" name="order_number" required>
            </div>
            <div class="form-group">
                <label for="opening_date">Data de Abertura</label>
                <input type="date" class="form-control" id="opening_date" name="opening_date" required>
            </div>
            <div class="form-group">
                <label for="consumer_name">Nome do Consumidor</label>
                <input type="text" class="form-control" id="consumer_name" name="consumer_name" required>
            </div>
            <div class="form-group">
                <label for="consumer_cpf">CPF do Consumidor</label>
                <input type="text" class="form-control" id="consumer_cpf" name="consumer_cpf" required>
            </div>
            <div class="form-group">
                <label for="product_id">Produto</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <?php foreach ($products as $product): ?>
                    <option value="<?php echo $product['id']; ?>"><?php echo $product['description']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Número da Ordem</th>
                    <th>Data de Abertura</th>
                    <th>Nome do Consumidor</th>
                    <th>CPF do Consumidor</th>
                    <th>Produto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?php echo $order['id']; ?></td>
                    <td><?php echo $order['number']; ?></td>
                    <td><?php echo $order['opening_date']; ?></td>
                    <td><?php echo $order['consumer_name']; ?></td>
                    <td><?php echo $order['consumer_cpf']; ?></td>
                    <td><?php echo $order['description']; ?></td>
                    <td>
                        <a href="javascript:void(0)" onclick="editOrder(<?php echo htmlspecialchars(json_encode($order)); ?>)" class="btn btn-sm btn-warning">Editar</a>
                        <a href="../orders?action=destroy&delete=<?php echo $order['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function editOrder(order) {
            document.getElementById('order_id').value = order.id;
            document.getElementById('order_number').value = order.number;
            document.getElementById('opening_date').value = order.opening_date;
            document.getElementById('consumer_name').value = order.consumer_name;
            document.getElementById('consumer_cpf').value = order.consumer_cpf;
            document.getElementById('product_id').value = order.product_id;
            document.querySelector('form').action = '../orders?action=update';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
