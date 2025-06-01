<?php
// Establecer codificación
header('Content-Type: text/html; charset=UTF-8');

// Recuperar el nombre de usuario desde GET
$usuario = isset($_GET['usuario']) ? htmlspecialchars(trim($_GET['usuario'])) : 'Invitado';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Bienvenido</title>
  <style>
    body {
      background: #f0f2f5;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #333;
    }
    .bienvenida {
      background: #fff;
      padding: 24px 32px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .bienvenida h1 {
      margin-bottom: 12px;
      font-size: 1.6rem;
      color: #007BFF;
    }
    .bienvenida p {
      font-size: 1rem;
    }
  </style>
</head>
<body>
  <div class="bienvenida">
    <h1>¡Bienvenido, <?php echo $usuario; ?>!</h1>
    <p>Has ingresado correctamente al sistema.</p>
    <p>ERES UN ADMIN.</p>
    <p>10 / 10.</p>

  </div>
</body>
</html>