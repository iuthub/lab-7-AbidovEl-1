<?php

$isFilled = false;

$db = new PDO('mysql:host=localhost;dbname=blog', 'admin', 'Ir3secmKzN9cVtGx');
$stmt_insert = $db->prepare('INSERT INTO users(username, fullname, email, password) VALUES (?, ?, ?, ?)');
$stmt_select = $db->prepare('SELECT * FROM users');

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $username = $_REQUEST['username'];
    $fullname = $_REQUEST['fullname'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['pwd'];
    $stmt_insert->execute(array($username, $fullname, $email, $password));
    $isFilled = true;
}

/*$stmt_select -> execute();
$rows = $stmt_select->fetchAll();*/

if($isFilled == true)
    header('Location: index.php');
