<?php require_once 'header.php'; ?>
    <h1>Product list</h1>
    <ul>
        <?php foreach ($productsList as $manufacturer => $products) : ?>
            <?php foreach ($products as $product) : ?>
                <li>
                    <h2><?php echo $product['name']; ?></h2>

                    <p><?php echo $manufacturer; ?> - company</p>

                    <p><?php echo $product['price']; ?>$</p>
                </li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul>
<?php require_once 'footer.php'; ?>