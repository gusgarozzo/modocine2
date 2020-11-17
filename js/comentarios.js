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
  let pelicula = document.getElementById("pelicula_id").value

  if (pelicula = comment.pelicula_id){
    console.log(comments)
  }
  fetch('api/comentarios' + '/' + pelicula)
  .then(response => response.json())
  .then((comments) => {
    

  })
  .catch(error => console.log(error));
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


  
