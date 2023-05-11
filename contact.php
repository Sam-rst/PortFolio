<?php
require_once 'config.php';

$database = new Database('localhost', 'root', '', 'portfolio');
$pdo = $database->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $title = htmlspecialchars($_POST['title']);
    $message = htmlspecialchars($_POST['message']);

    $sql = "
    INSERT INTO contacts (name, email, phone, title, message) VALUES
        ('$name', '$email', '$phone', '$title', '$message');
    ";

    $pdo->query($sql);
    header('Location: index.html');
}
