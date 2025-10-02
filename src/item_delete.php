<?php
$conn = new mysqli('localhost', 'username', 'password', 'database');

$id = intval($_GET['id'] ?? 0);
if ($id > 0) {
    $conn->query("DELETE FROM items WHERE id=$id");
}
header('Location: items.php');
exit;
?>