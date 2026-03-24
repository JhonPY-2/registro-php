<?php

if (!empty($exito)) {
    $_SESSION['usuario'] = $_POST['name']  ?? '';
    $_SESSION['correo']  = $_POST['email'] ?? '';
}

if (isset($_GET['cerrar'])) {
    session_unset();
    unset($_SESSION);
    session_destroy();
    header('Location: index.php');
    exit;
}


?>