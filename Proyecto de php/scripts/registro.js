document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registroForm");
  const submitBtn = document.getElementById("submitBtn");
  const mensajeExito = document.getElementById("mensajeExito");

  // Validación en tiempo real
  const campos = ["nombre", "apellido", "email", "password", "confirmPassword"];
  campos.forEach((campo) => {
    const input = document.getElementById(campo);
    input.addEventListener("input", () => validarCampo(campo));
  });

  document
    .getElementById("confirmPassword")
    .addEventListener("input", () => validarConfirmacion());

  // Validación del formulario al enviar
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    let valido = true;

    campos.forEach((campo) => {
      if (!validarCampo(campo)) valido = false;
    });

    if (!validarConfirmacion()) valido = false;

    if (valido) {
      mensajeExito.style.display = "block";
      form.reset();
      // Aquí normalmente enviarías los datos a un backend
      console.log("Formulario válido. Enviar a backend...");
    }
  });

  // Funciones de validación
  function validarCampo(campo) {
    const input = document.getElementById(campo);
    const errorEl = document.getElementById(`error${capitalizar(campo)}`);
    const successEl = document.getElementById(`success${capitalizar(campo)}`);

    let valido = true;
    let mensaje = "";

    switch (campo) {
      case "nombre":
      case "apellido":
        if (input.value.trim() === "") {
          mensaje = "Este campo es obligatorio.";
          valido = false;
        } else if (input.value.trim().length < 2) {
          mensaje = "Debe tener al menos 2 caracteres.";
          valido = false;
        }
        break;

      case "email":
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(input.value)) {
          mensaje = "Por favor ingresa un correo válido.";
          valido = false;
        }
        break;

      case "password":
        if (input.value.length < 6) {
          mensaje = "La contraseña debe tener al menos 6 caracteres.";
          valido = false;
        }
        break;
    }

    mostrarResultado(campo, valido, mensaje, errorEl, successEl);
    return valido;
  }

  function validarConfirmacion() {
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const errorEl = document.getElementById("errorConfirmPassword");
    const successEl = document.getElementById("successConfirmPassword");

    let valido = true;
    let mensaje = "";

    if (confirmPassword !== password) {
      mensaje = "Las contraseñas no coinciden.";
      valido = false;
    } else if (confirmPassword === "") {
      mensaje = "Este campo es obligatorio.";
      valido = false;
    }

    mostrarResultado("confirmPassword", valido, mensaje, errorEl, successEl);
    return valido;
  }

  function mostrarResultado(campo, valido, mensaje, errorEl, successEl) {
    if (!valido) {
      errorEl.textContent = mensaje;
      errorEl.style.display = "block";
      successEl.style.display = "none";
    } else if (mensaje === "") {
      errorEl.style.display = "none";
      if (campo !== "confirmPassword") {
        successEl.textContent = "✓ Correcto";
        successEl.style.display = "block";
      } else {
        successEl.style.display = "none";
      }
    }
  }

  function capitalizar(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
  }
});
