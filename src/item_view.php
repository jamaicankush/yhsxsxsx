<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

$id = intval($_GET['id'] ?? 0);
if ($id <= 0) {
    die('Некорректный ID');
}

$result = $conn->query("SELECT * FROM items WHERE id=$id");
$row = $result->fetch_assoc();

if (!$row) {
    die('Запись не найдена');
}
?>

<h1>Просмотр записи #<?= $id ?></h1>
<p><strong>Заголовок:</strong> <?= htmlspecialchars($row['title']) ?></p>
<p><strong>Описание:</strong> <?= htmlspecialchars($row['description']) ?></p>

<a href="items.php">Назад к списку</a>

<?php $conn->close(); ?>