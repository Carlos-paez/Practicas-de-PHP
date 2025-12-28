document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("registroForm");
  const mensajeExito = document.getElementById("mensajeExito");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    // Asegúrate de que esta ruta sea la correcta desde donde esté Registro.php
    fetch("../Controlers/controler-Registro.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json()) // El PHP devuelve JSON
      .then((data) => {
        if (data.status === "success") {
          mensajeExito.style.color = "green";
          mensajeExito.textContent = data.message;
          form.reset();

          // Redirigir al login tras 2 segundos
          setTimeout(() => {
            window.location.href = "../Index.php";
          }, 2000);
        } else {
          // Mostrar el error específico que mandó el PHP
          mensajeExito.style.color = "red";
          mensajeExito.textContent = "Error: " + data.message;
        }
      })
      .catch((error) => {
        console.error("Error:", error);
        mensajeExito.style.color = "red";
        mensajeExito.textContent = "Hubo un error al procesar el registro.";
      });
  });
});
