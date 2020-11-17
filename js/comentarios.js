"use strict";

let comentarios = []

document.addEventListener("DOMContentLoaded", function(){
  getComments();
  document.getElementById("commentForm").addEventListener("submit", e => {
    e.preventDefault();
    addComent();
  });
})

function getComments() {
  fetch('api/comentarios')
      .then(response => response.json())
      .then(comments => renderComments(comments))
      .catch(error => console.log(error));
}

function renderComments(comments){
  let container = document.querySelector('#div-comentarios');
  for (let comment of comments) {
    console.log(comment);
    container.innerHTML +=  `<div> <h3>${comment.id_usuario}</h3> Comentario: ${comment.comentario} - Puntaje: ${comment.puntaje} - Pelicula: ${comment.id_pelicula}</div>`;
  }
}

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


  
