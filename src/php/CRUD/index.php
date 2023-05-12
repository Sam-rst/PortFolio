<?php
include 'functions.php';
// Your PHP code here.
$msg = '';
// Home Page template below.
?>

<?=template_header('Home')?>

<div class="content">
	<h2>Home</h2>
	<p>Welcome to the CRUD page !</p>
</div>

<?php if ($msg) : ?>
    <p><?= $msg ?></p>
<?php endif; ?>
<?=template_footer()?>