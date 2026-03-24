<?php
if (empty($errores) && !empty($exito)) {
    $sql = "SELECT id_user FROM users WHERE user = ? OR email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $errores['name'] = 'El usuario o correo ya está registrado.';
        $exito = '';
    } else {
        
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $confirm_hash  = password_hash($_POST['confirm'], PASSWORD_BCRYPT);

       
        $sql = "INSERT INTO users (user, email, password, confirm_password) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $password_hash, $confirm_hash);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}
?>