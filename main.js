// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
  // Obtén una referencia al formulario
  const form = document.getElementById("registrationForm");

  // Agrega un evento de escucha para el envío del formulario
  form.addEventListener("submit", function (event) {
    // Evita que el formulario se envíe
    event.preventDefault();

    // Valida el formulario
    if (form.checkValidity()) {
      showToast("Te haz registrado correctamente.");
    }
  });

  function showToast(message) {
    Toastify({
      text: message,
      duration: 3000, // Duración de la alerta en milisegundos (3 segundos)
      close: true, // Muestra el botón de cierre
      gravity: "top", // Posición de la alerta (top, bottom, left, right)
      position: "center", // Alineación horizontal de la alerta (left, center, right)
      backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Color de fondo de la alerta
    }).showToast();
  }
});

// Animaciion lottie

document.addEventListener("DOMContentLoaded", function () {
  // Configura la ruta del archivo JSON de la animación Lottie
  const animationPath = "/server.json";

  // Configura las opciones de la animación
  const animationOptions = {
    container: document.getElementById("animation"),
    renderer: "svg",
    loop: true,
    autoplay: true,
    path: animationPath,
  };

  // Crea la animación Lottie
  const animation = lottie.loadAnimation(animationOptions);
});


// Para mapear a los usuarios 
// document.addEventListener("DOMContentLoaded", function() {
//   const userTableBody = document.getElementById("userTableBody");

//   fetch("users.json")
//     .then(response => response.json())
//     .then(users => {
//       users.forEach(user => {
//         const row = document.createElement("tr");
//         row.innerHTML = `
//           <td>${user.nombre}</td>
//           <td>${user.apellido}</td>
//           <td>${user.edad}</td>
//           <td>${user.correo}</td>
//           <td>${user.carrera}</td>
//         `;
//         userTableBody.appendChild(row);
//       });
//     })
//     .catch(error => console.error("Error al cargar usuarios:", error));
// });



