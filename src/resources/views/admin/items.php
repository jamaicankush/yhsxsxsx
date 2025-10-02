<?php
// подключение базы данных
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die('Ошибка подключения: ' . $conn->connect_error);
}

// Получение данных
$result = $conn->query("SELECT * FROM items");

?>

<h1>Управление записями</h1>
<a href="item_create.php">Добавить новую</a>
<table border="1" cellpadding="5" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Заголовок</th>
    <th>Описание</th>
    <th>Действия</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td>
        <a href="item_view.php?id=<?= $row['id'] ?>">Просмотр</a> |
        <a href="item_edit.php?id=<?= $row['id'] ?>">Редактировать</a> |
        <a href="item_delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Удалить?')">Удалить</a>
    </td>
</tr>
<?php endwhile; ?>
</table>

<?php
$conn->close();
?>