<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die('Некорректный ID');
}

// получим текущие данные
$result = $conn->query("SELECT * FROM items WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE items SET title=?, description=? WHERE id=?");
    $stmt->bind_param("ssi", $title, $description, $id);
    $stmt->execute();
    $stmt->close();

    header('Location: items.php');
    exit;
}
?>

<h1>Редактировать запись #<?= $id ?></h1>
<form method="post" action="">
    <label>Заголовок:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required><br><br>
    
    <label>Описание:</label><br>
    <textarea name="description" rows="5" cols="50" required><?= htmlspecialchars($row['description']) ?></textarea><br><br>
    
    <button type="submit">Обновить</button>
</form>
<a href="items.php">Вернуться к списку</a>

<?php $conn->close(); ?>