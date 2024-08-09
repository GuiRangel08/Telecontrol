<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Produtos</h1>
        <form method="post" action="../products?action=store">
            <input type="hidden" name="id" id="product-id">
            <div class="form-group">
                <label for="code">Código</label>
                <input type="text" class="form-control" id="code" name="code" required>
            </div>
            <div class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="form-group">
                <label for="warranty_period">Tempo de Garantia</label>
                <input type="text" class="form-control" id="warranty_period" name="warranty_period" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Tempo de Garantia</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php echo $product['id']; ?></td>
                    <td><?php echo $product['code']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['warranty_period']; ?></td>
                    <td>
                        <a href="javascript:void(0)" onclick="editProduct(<?php echo htmlspecialchars(json_encode($product)); ?>)" class="btn btn-sm btn-warning">Editar</a>
                        <a href="../products?action=destroy&delete=<?php echo $product['id']; ?>" class="btn btn-sm btn-danger">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function editProduct(product) {
            document.getElementById('product-id').value = product.id;
            document.getElementById('code').value = product.code;
            document.getElementById('description').value = product.description;
            document.getElementById('warranty_period').value = product.warranty_period;
            document.querySelector('form').action = 'products?action=update';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
</body>
</html>
