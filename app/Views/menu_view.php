<!-- app/Views/menu_view.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
</head>
<body>

    <h1>Menu</h1>

    <form action="/order" method="post">
        <ul>
            <?php foreach ($produk as $item): ?>
                <li>
                    <img src="<?= $menuItemModel->getImagePath($item['id']); ?>" alt="<?= $item['name']; ?>" width="100">
                    <?= $item['name']; ?> - $<?= $item['price']; ?>
                    <br>
                    <?= $item['description']; ?>
                    <br>
                    <input type="checkbox" name="order[]" value="<?= $item['id']; ?>">
                </li>
            <?php endforeach; ?>
        </ul>

        <button type="submit">Place Order</button>
    </form>

</body>
</html>
