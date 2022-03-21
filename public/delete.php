<?php
include './bootstrap.php';
include '../src/Contact.php';

use CT275\Labs\Contact;

$contact = new Contact($PDO);

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['id'])
    && ($contact->find($_POST['id'])) != null
)  {
    $contact->delete();
}

header('Location: helloworld.php');
$fh = fopen('D:/xampp/htdocs/public/index.php', 'a');
fwrite($fh, $_SERVER['REMOTE_ADDR'] . ' ' . date('c') . "\n");
fclose($fh);