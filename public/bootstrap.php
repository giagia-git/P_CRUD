<?php

define('ROOTDIR',__DIR__ . DIRECTORY_SEPARATOR);

$ROOTURL = '/';

/* require_once ROOTDIR . 'autoload.php'; */
/* require_once ROOTDIR . 'src/helpers.php'; */
/* require_once 'D:/xampp/htdocs/lab4/src/helpers.php'; */
include './autoload.php';
include '../src/PDOFactory.php';

try {
    $PDO = (new CT275\Labs\PDOFactory())->create([
        'dbhost' => 'localhost',
        'dbname' => 'ct275_lab4',
        'dbuser' => 'root',
        'dbpass' => 'root'
    ]);
} catch (Exception $ex) {
    exit("<pre>${ex}</pre>");
}