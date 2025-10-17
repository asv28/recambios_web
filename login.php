<?php
session_start();
include("includes/conexion.php");

$mensaje = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $stmt = $conexion->prepare("SELECT nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($nombre, $hash, $rol);

    if ($stmt->fetch()) {
        if (password_verify($password, $hash)) {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['rol'] = $rol;
            $_SESSION['email'] = $email;
            $stmt->close();
            header("Location: index.php");
            exit;
        } else {
            $mensaje = "Contraseña incorrecta.";
        }
    } else {
        $mensaje = "Correo no registrado.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <!-- Puedes añadir aquí CSS o Bootstrap si quieres -->
</head>
<body>
<div>
    <h2>Iniciar sesión</h2>
    <?php if ($mensaje): ?>
        <div><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Correo electrónico</label>
        <input type="email" name="email" required>
        <br>
        <label>Contraseña</label>
        <input type="password" name="password" required>
        <br>
        <button>Entrar</button>
    </form>
    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
</div>
</body>
</html>
