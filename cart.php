<?php
include 'includes/db.php';

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
}

include 'includes/header.php';

$total = 0;

if (!empty($_SESSION['cart'])) {
    echo "<h1>سلة المشتريات</h1>";
    foreach ($_SESSION['cart'] as $id => $qty) {
        $result = $conn->query("SELECT * FROM products WHERE id=$id");
        $row = $result->fetch_assoc();
        $subtotal = $row['price'] * $qty;
        $total += $subtotal;
        echo "<div>{$row['name']} x $qty = $subtotal$</div>";
    }
    echo "<hr><strong>المجموع: $total$</strong>";
} else {
    echo "<p>السلة فارغة</p>";
}

include 'includes/footer.php';
?>
