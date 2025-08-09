<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h1>المنتجات</h1>
<div class="products">
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()):
    ?>
        <div class="product">
            <img src="<?= $row['image'] ?>" width="150">
            <h3><?= $row['name'] ?></h3>
            <p><?= $row['description'] ?></p>
            <p><?= $row['price'] ?>$</p>
            <a href="cart.php?add=<?= $row['id'] ?>">أضف إلى السلة</a>
        </div>
    <?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>
