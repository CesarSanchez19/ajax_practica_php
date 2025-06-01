// Esperamos a que el DOM cargue completamente
document.addEventListener('DOMContentLoaded', function() {
  const formulario = document.getElementById('loginForm');
  const mensajeError = document.getElementById('mensajeError');

  formulario.addEventListener('submit', function(e) {
    e.preventDefault(); // Evita que el formulario recargue la página automáticamente

    // Capturamos los valores de los campos
    const usuario = document.getElementById('usuario').value.trim();
    const password = document.getElementById('password').value.trim();

    // Validación básica en el cliente: verificar que ambos campos no estén vacíos
    if (usuario === '' || password === '') {
      mensajeError.textContent = 'Ambos campos son obligatorios.';
      return;
    }

    // Creamos un objeto FormData a partir del formulario
    const datos = new FormData();
    datos.append('usuario', usuario);
    datos.append('password', password);

    // Realizamos la petición AJAX usando Fetch API y POST
    fetch('procesar.php', {
      method: 'POST',
      body: datos
    })
    .then(respuesta => respuesta.json()) // Esperamos JSON del backend
    .then(data => {
      if (data.success) {
        // Si la respuesta indica éxito, redirigimos a welcome.php pasando el nombre en la URL
        window.location.href = 'welcome.php?usuario=' + encodeURIComponent(data.usuario);
      } else {
        // Si hay error (credenciales inválidas), mostramos el mensaje en el div mensajeError
        mensajeError.textContent = data.message;
      }
    })
    .catch(error => {
      console.error('Error en la petición:', error);
      mensajeError.textContent = 'Ocurrió un error inesperado. Intenta de nuevo.';
    });
  });
});