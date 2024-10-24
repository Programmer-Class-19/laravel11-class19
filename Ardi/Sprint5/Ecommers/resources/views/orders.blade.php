<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Order</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Buat Order Baru</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="order_id">Order ID</label>
                <input type="text" name="order_id" id="order_id" class="form-control" required>
            </div>

            <h3>Items</h3>
            <div id="items-container">
                <div class="form-group">
                    <label for="product_id_0">Product ID</label>
                    <input type="text" name="items[0][product_id]" id="product_id_0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity_0">Quantity</label>
                    <input type="number" name="items[0][quantity]" id="quantity_0" class="form-control" required min="1">
                </div>
            </div>
            <button type="button" id="add-item" class="btn btn-secondary">Tambah Item</button>

            <button type="submit" class="btn btn-primary mt-3">Buat Order</button>
        </form>
    </div>

    <script>
        let itemIndex = 1;

        document.getElementById('add-item').onclick = function() {
            const itemsContainer = document.getElementById('items-container');
            const newItemHTML = `
                <div class="form-group">
                    <label for="product_id_${itemIndex}">Product ID</label>
                    <input type="text" name="items[${itemIndex}][product_id]" id="product_id_${itemIndex}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="quantity_${itemIndex}">Quantity</label>
                    <input type="number" name="items[${itemIndex}][quantity]" id="quantity_${itemIndex}" class="form-control" required min="1">
                </div>
            `;
            itemsContainer.insertAdjacentHTML('beforeend', newItemHTML);
            itemIndex++;
        }
    </script>
</body>
</html>
