"use strict";

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
  let peli_id = document.querySelector('#peli_id').value;
  container.innerHTML = ' ';
  console.log(nickname)
  for (let comment of comments) {
    console.log(comment);
    if (peli_id == comment.id_pelicula) {
      /*let divContainer = document.createElement("div");
      let divPuntaje = document.createElement("div");
      let divComentario = document.createElement("div");
      let spanNick = document.createElement("span");
      let deleteButton = document.createElement("button");

      divPuntaje.innerHTML = comment.puntaje;
      divComentario.innerHTML = comment.comentario;
      spanNick.innerHTML = comment.nickname;
      divComentario.appendChild(spanNick);
      deleteButton.innerHTML = 'X';

      deleteButton.id = */

      container.innerHTML +=  `<div class="posteo">
                                    <div>Puntaje: ${comment.puntaje}</div>
                                    <div class="caja-comentario"> 
                                       <span class="nick">${comment.nickname} dijo:</span> " 
                                   ${comment.comentario}"</div>
                                   <button id='borrar'>X</button>
                                </div>`;
    }
  }
}

function addComent(){
    let comentario = {
      "comentario": document.getElementById("comment").value,
      "puntaje": document.querySelector("#puntaje").value,
      "usuario_id": document.querySelector("#usuario_id").value,
      "nickname": document.querySelector("#nickname").value,
      "pelicula_id": document.getElementById("pelicula_id").value
    }

    fetch('api/comentarios', {
      method: 'POST',
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(comentario)
    })

    .then(response => response.json())
    //.then(() => comentarios.push(comentario))
    .then(comentario => getComments())
    .catch(error => console.log(error));
}

function deleteComment(){
  fetch('api/comentarios', {
    method: 'DELETE',
    headers: { "Content-Type": "application/json" },
  })
  .then(response => response.json())
  .then(() => {
    for (let comment of comments){
      comments.pop(comment.id)
    }   
  })
  .catch(console.log(error))
}

