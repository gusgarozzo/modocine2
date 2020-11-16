"use strict";

document.addEventListener("DOMContentLoaded", function(){
  document.querySelector("#commentForm").addEventListener("submit", e => {
    e.preventDefault();
    addComent();
  });
})

  function addComent(){

      const comentario = {
        mensaje: document.querySelector("#comment").value,
        puntaje:document.querySelector("#puntaje").value,
        usuario_id: document.querySelector("#usuario_id").getAttribute("data"),
        pelicula_id: document.getElementById("pelicula_id").value
      }

      fetch('api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(comentario)
      })

      .then(response => response.json()) // No ejecuta, consola lanza error "Unexpected end of JSON input"
      .then(comentario => console.log(comentario))
      .catch(error => console.log("error"));
  }

  
  
