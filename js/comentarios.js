"use strict";

let comentarios = []

document.addEventListener("DOMContentLoaded", function(){
  document.getElementById("commentForm").addEventListener("submit", e => {
    e.preventDefault();
    addComent();
  });
})

  function addComent(){

      const comentario = {
        "comentario": document.getElementById("comment").value,
        "puntaje": document.querySelector("#puntaje").value,
        "usuario_id": document.querySelector("#usuario_id").getAttribute("data"),
        "pelicula_id": document.getElementById("pelicula_id").value
      }

      console.log(comentario)

      fetch('api/comentarios', {
        method: 'POST',
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(comentario)
      })

      .then(response => response.json())
      .then(() => comentarios.push(comentario))
      .catch(error => console.log(error));
  }


  
