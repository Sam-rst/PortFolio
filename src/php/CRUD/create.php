<?php
include_once '../config.php';
include_once 'functions.php';

// Connect to MySQL database
$database = new Database('localhost', 'root', '', 'portfolio');
$pdo = $database->connect();

$msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $title = htmlspecialchars($_POST['title']);
    $message = htmlspecialchars($_POST['message']);

    $sql = $pdo->prepare("INSERT INTO contacts (name, email, phone, title, message) VALUES (?, ?, ?, ?, ?);");
    $sql->execute([$name, $email, $phone, $title, $message]);
    // $pdo->query($sql);

    // Output message
    $msg = 'Created Successfully!';
}
?>

<?= template_header('Create') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortFolio - Samuel RESSIOT</title>

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../assets/css/style.css">

</head>

<!-- Contact section design -->
<section class="contact" id="contact">
    <h2 class="heading">Contact <span>Me</span> !</h2>

    <form action="create.php" method="post">
        <div class="input-box">
            <input type="text" name="name" id="name" required placeholder="Full Name">
            <input type="email" name="email" id="email" required placeholder="Email Address">
        </div>

        <div class="input-box">
            <input type="number" name="phone" id="phone" required placeholder="Mobile Number">
            <input type="text" name="title" id="title" required placeholder="Email Title">
        </div>
        <textarea name="message" id="message" cols="30" rows="10" required placeholder="Your Message"></textarea>
        <input type="submit" value="Send Message" class="btn">
    </form>
</section>
<?php if ($msg) : ?>
    <p><?= $msg ?></p>
<?php endif; ?>

<?= template_footer() ?>