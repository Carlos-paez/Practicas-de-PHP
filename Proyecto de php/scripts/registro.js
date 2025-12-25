document
  .getElementById("registroForm")
  .addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("registro_usuario.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        if (data.trim() === "success") {
          document.getElementById("mensajeExito").style.display = "block";
          this.reset();
        } else {
          alert(data);
        }
      });
  });
