<?php
session_start();

if(isset($_GET['action']) && $_GET['action'] == "deleteAll"){
    session_destroy();
    header("Location: index.php");
    exit;
}
if(isset($_GET['id']) && !empty($_GET['id']) && isset($_GET['action']) && $_GET['action'] == "delete"){
    $id = htmlspecialchars($_GET['id']);
    unset($_SESSION[$id]);
    header("Location: index.php");
    exit;
}else{
    header("Location: index.php");
    exit;
}