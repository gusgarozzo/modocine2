"use strict";

document.addEventListener("DOMContentLoaded", function(){
  getComments();
  document.getElementById("commentForm").addEventListener("submit", e => {
    e.preventDefault();
    addComent();
  });
})

let baseURL = "api/comentarios";

function getComments() {
  fetch(baseURL)
      .then(response => response.json())
      .then(comments => renderComments(comments))
      .catch(error => console.log(error));
}

function renderComments(comments){
  let container = document.querySelector('#div-comentarios');
  let peli_id = document.querySelector('#peli_id').value;
  let admin = document.querySelector("#admin").value;
  console.log(admin);
  container.innerHTML = ' ';
  console.log(nickname)
  for (let comment of comments) {
    console.log(comment.id);
    if (peli_id == comment.id_pelicula) {
      let divContainer = document.createElement("div");
      let divPuntaje = document.createElement("div");
      let divComentario = document.createElement("div");
      let spanNick = document.createElement("span");
      let deleteButton = document.createElement("button");

      divPuntaje.innerHTML = "Puntaje: " + comment.puntaje;
      spanNick.innerHTML = comment.nickname + " dijo: ";
      spanNick.classList.add("nick");
      divComentario.appendChild(spanNick);
      divComentario.innerHTML += comment.comentario;
      deleteButton.innerHTML = 'Borrar comentario';
      divContainer.appendChild(divPuntaje);
      divContainer.appendChild(divComentario);
      divContainer.classList.add("posteo");
      container.appendChild(divContainer);
      let id = comment.id;
      if (admin == 1) {
        divContainer.appendChild(deleteButton);
        deleteButton.addEventListener("click", () => deleteComment(id));
      }
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

    fetch(baseURL, {
      method: 'POST',
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(comentario)
    })

    .then(response => response.json())
    .then(comentario => getComments())
    .catch(error => console.log(error));
}

function deleteComment(id){
  fetch(baseURL+"/"+id, {
    method: 'DELETE',
  })
  .then(function (respuesta) {
    if (!respuesta.ok) {
        console.log("Error");
    }
    else {
      getComments();
    }
  })
}