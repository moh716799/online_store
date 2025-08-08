<?php include '../includes/db.php'; ?>

<form method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="اسم المنتج"><br>
    <textarea name="description" placeholder="الوصف"></textarea><br>
    <input type="number" step="0.01" name="price" placeholder="السعر"><br>
    <input type="text" name="image" placeholder="رابط الصورة"><br>
    <input type="submit" value="إضافة">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $_POST['name'], $_POST['description'], $_POST['price'], $_POST['image']);
    $stmt->execute();
    echo "تمت الإضافة";
}
?>
