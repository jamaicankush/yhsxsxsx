<?php
// подключение базы данных
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO items (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();
    $stmt->close();

    header('Location: items.php');
    exit;
}
?>

<h1>Добавить новую запись</h1>
<form method="post" action="">
    <label>Заголовок:</label><br>
    <input type="text" name="title" required><br><br>
    <label>Описание:</label><br>
    <textarea name="description" rows="5" cols="50" required></textarea><br><br>
    <button type="submit">Сохранить</button>
</form>
<a href="items.php">Вернуться к списку</a>

<?php $conn->close(); ?>