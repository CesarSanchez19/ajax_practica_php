<?php
header('Content-Type: application/json; charset=UTF-8');

// Verificamos que la petición sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperamos y saneamos los datos
    $usuario = isset($_POST['usuario']) ? trim($_POST['usuario']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';

    // Validación básica en el servidor: no permitir campos vacíos
    if ($usuario === '' || $password === '') {
        $response = [
            'success' => false,
            'message' => 'Por favor llena ambos campos.'
        ];
        echo json_encode($response);
        exit;
    }

    // Para este ejemplo simple, definimos un usuario y contraseña "fijos"
    $usuarioValido = 'cesar';
    $passwordValida = '123456';

    if ($usuario === $usuarioValido && $password === $passwordValida) {
        // Credenciales correctas
        $response = [
            'success' => true,
            'usuario' => $usuario  // devolvemos el nombre de usuario para mostrar luego
        ];
    } else {
        // Credenciales incorrectas
        $response = [
            'success' => false,
            'message' => 'Usuario o contraseña incorrecta.'
        ];
    }

    echo json_encode($response);
    exit;
}

// Si no es método POST
$response = [
    'success' => false,
    'message' => 'Método no permitido.'
];
echo json_encode($response);
exit;