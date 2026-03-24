<?php
session_start();
include 'conexion.php';  
include 'validaciones.php';  
include 'consultas.php'; 
require_once 'sesiones.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700;900&family=Cinzel:wght@400;600&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
</head>
<body>

    <div class="bg-overlay"></div>

    <div class="flames-bottom">
        <div class="flame f1"></div><div class="flame f2"></div>
        <div class="flame f3"></div><div class="flame f4"></div>
        <div class="flame f5"></div><div class="flame f6"></div>
        <div class="flame f7"></div><div class="flame f8"></div>
    </div>

    <div class="main-layout">

        <div class="ace-panel">
            <img src="imagenes/asce.jpg" alt="Imagen" class="ace-img">
            <div class="ace-glow"></div>
        </div>

        <div class="form-panel">
            <div class="mirror-card">

                <div class="mirror-shine"></div>

                <div class="card-header">
                    <div class="fire-icon">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C12 2 8 6 8 10C8 12.5 9.5 14.5 12 15C14.5 14.5 16 12.5 16 10C16 6 12 2 12 2Z" fill="url(#fg1)"/>
                            <path d="M12 15C9 15 6 17.5 6 20.5C6 22 7 23 8.5 23C9.5 23 10.3 22.4 11 21.5C11.5 22.4 12 23 12 23C12 23 12.5 22.4 13 21.5C13.7 22.4 14.5 23 15.5 23C17 23 18 22 18 20.5C18 17.5 15 15 12 15Z" fill="url(#fg2)"/>
                            <defs>
                                <linearGradient id="fg1" x1="12" y1="2" x2="12" y2="15" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#fff7aa"/>
                                    <stop offset="50%" stop-color="#ff8c00"/>
                                    <stop offset="100%" stop-color="#ff4500"/>
                                </linearGradient>
                                <linearGradient id="fg2" x1="12" y1="15" x2="12" y2="23" gradientUnits="userSpaceOnUse">
                                    <stop offset="0%" stop-color="#ff6600"/>
                                    <stop offset="100%" stop-color="#cc2200"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <h1 class="card-title">Crear cuenta</h1>
                    <p class="card-subtitle">Completa los campos para registrarte</p>
                </div>

                <?php if (!empty($exito)): ?>
                    <div class="success-msg">
                        <svg viewBox="0 0 24 24" fill="none" width="18" height="18" style="flex-shrink:0">
                            <circle cx="12" cy="12" r="10" fill="rgba(255,150,0,0.2)" stroke="#ffb347" stroke-width="1.5"/>
                            <path d="M7 12.5l3.5 3.5 6-7" stroke="#ffe066" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div>
                            <?php echo $exito; ?><br>  
                        </div>
                    </div>
                <?php endif; ?>

                <form method="POST" action="" class="card-form" autocomplete="off">

                    <div class="field-group">
                        <label class="field-label">Usuario</label>
                        <div class="input-wrapper <?php echo !empty($errores['name']) ? 'input-error' : ''; ?>">
                            <input type="text" name="name" placeholder="Nombre de usuario"
                                value="<?php echo htmlspecialchars($name); ?>" class="fire-input">
                        </div>
                        <?php if (!empty($errores['name'])): ?>
                            <p class="error-msg"><?php echo $errores['name']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Correo electrónico</label>
                        <div class="input-wrapper <?php 
                        echo !empty($errores['email']) ? 'input-error' : ''; ?>">
                            <input type="email" name="email" placeholder="correo@ejemplo.com"
                                value="<?php echo htmlspecialchars($email); ?>" class="fire-input">
                        </div>
                        <?php if (!empty($errores['email'])): ?>
                            <p class="error-msg"><?php echo $errores['email']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Contraseña</label>
                        <div class="input-wrapper <?php echo !empty($errores['password']) ? 'input-error' : ''; ?>">
                            <input type="password" name="password" placeholder="••••••••" class="fire-input">
                        </div>
                        <?php if (!empty($errores['password'])): ?>
                            <p class="error-msg"><?php echo $errores['password']; ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="field-group">
                        <label class="field-label">Confirmar contraseña</label>
                        <div class="input-wrapper <?php echo !empty($errores['confirm']) ? 'input-error' : ''; ?>">
                            <input type="password" name="confirm" placeholder="••••••••" class="fire-input">
                        </div>
                        <?php if (!empty($errores['confirm'])): ?>
                            <p class="error-msg"><?php echo $errores['confirm']; ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="fire-btn">Registrarse</button>

                </form>

                
                <?php if (!empty($_SESSION['usuario'])): ?>
                    <a href="index.php?cerrar=1" class="fire-btn logout-btn">
                        Cerrar sesión
                    </a>
                <?php endif; ?>

                <p class="card-footer">
                    ¿Ya tienes cuenta? <a href="#" class="footer-link">Inicia sesión</a>
                </p>

            </div>
        </div>

    </div>

</body>
</html>