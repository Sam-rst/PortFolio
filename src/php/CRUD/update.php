<?php
include_once '../config.php';
include_once 'functions.php';

// Connect to MySQL database
$database = new Database('localhost', 'root', '', 'portfolio');
$pdo = $database->connect();
$msg = '';
// Check if the contact id exists, for example update.php?id=1 will get the contact with the id of 1

if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';
        // Update the record
        $sql = $pdo->prepare("UPDATE contacts SET name = ?, email = ?, phone = ?, title = ?, message = ? WHERE id = ?;");
        echo $_GET['id'];
        $sql->execute([$name, $email, $phone, $title, $message, $_GET['id']]);
        $msg = 'Updated Successfully!';
        header('Location: read.php');
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM contacts WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

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

<?= template_header('Read') ?>

<!-- Contact section design -->
<section class="contact" id="contact">
    <h2 class="heading">Update Contact <span>#<?= $contact['id'] ?></span></h2>

    <form action="update.php?id=<?=$contact['id']?>" method="post">
        <div class="input-box">
            <input type="text" name="name" id="name" required placeholder="Full Name" value="<?= $contact['name'] ?>">
            <input type="email" name="email" id="email" required placeholder="Email Address" value="<?= $contact['email'] ?>">
        </div>

        <div class="input-box">
            <input type="number" name="phone" id="phone" required placeholder="Mobile Number" value="<?= $contact['phone'] ?>">
            <input type="text" name="title" id="title" required placeholder="Email Title" value="<?= $contact['title'] ?>">
        </div>
        <textarea name="message" id="message" cols="30" rows="10" required placeholder="Your Message"><?= $contact['message'] ?></textarea>
        <input type="submit" value="Send Message" class="btn">
    </form>
</section>
<?php if ($msg) : ?>
    <p><?= $msg ?></p>
<?php endif; ?>
<?= template_footer() ?>