<?php
session_start();
    unset($_SESSION['id_master']);
    unset($_SESSION['id_user']);
    unset($_SESSION['id_gerente']);
    unset($_SESSION['id_especial']);
        header('Location: index.php');
        exit();
?>