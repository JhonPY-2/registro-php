<?php
$errores  = [];
$exito    = '';
$name     = trim($_POST['name']     ?? '');
$email    = trim($_POST['email']    ?? '');
$password = trim($_POST['password'] ?? '');
$confirm  = trim($_POST['confirm']  ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($name)) {
        $errores['name'] = 'El usuario es obligatorio.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]{4,20}$/', $name)) {
        $errores['name'] = 'Entre 4 y 20 caracteres. Solo letras, números o _.';
    }

    if (empty($email)) {
        $errores['email'] = 'El correo es obligatorio.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El correo no tiene un formato válido.';
    }

    if (empty($password)) {
        $errores['password'] = 'La contraseña es obligatoria.';
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $errores['password'] = 'Mínimo 8 caracteres, mayúscula, minúscula, número y símbolo.';
    }

    if (empty($confirm)) {
        $errores['confirm'] = 'Debes confirmar la contraseña.';
    } elseif ($password !== $confirm) {
        $errores['confirm'] = 'Las contraseñas no coinciden.';
    }

    if (empty($errores)) {
        $exito = '¡Registro exitoso! Bienvenido, ' . htmlspecialchars($name) . '.';
    }

}
?>