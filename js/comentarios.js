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
  let form = document.querySelector("#commentBox");
  let sesion = document.querySelector("#sesion")
  if (admin==3) {
    form.style.display = "none";
  }

  container.innerHTML = ' ';

  for (let comment of comments) {

    // Transforma el valor numerico en estrellas
    if (comment.puntaje == 1){
      comment.puntaje = "★";
    }else if(comment.puntaje == 2){
      comment.puntaje = "★★";
    }else if(comment.puntaje == 3){
      comment.puntaje = "★★★";
    }else if(comment.puntaje == 4){
      comment.puntaje = "★★★★";
    }else if(comment.puntaje == 5){
      comment.puntaje = "★★★★★";
    }


    if (peli_id == comment.id_pelicula) {
      let divContainer = document.createElement("div");
      let divPuntaje = document.createElement("div");
      let divComentario = document.createElement("div");
      let spanNick = document.createElement("span");
      let deleteButton = document.createElement("button");
      let icono = document.createElement("i"); 

      // Boton para borrar comentario
      
      deleteButton.style.display = 'none';
      // Asigno evento para borrar comentario
      

      divPuntaje.innerHTML = "Clasificación: " + comment.puntaje;
      spanNick.innerHTML = comment.nickname + " dijo: ";
      spanNick.classList.add("nick");
      divComentario.appendChild(spanNick);
      divComentario.innerHTML += comment.comentario;

      divContainer.appendChild(divPuntaje);
      divContainer.appendChild(divComentario);
      divContainer.classList.add("posteo");
      container.appendChild(divContainer);

      let id = comment.id;

      if(sesion == null){
        form.style.display = "none";
      }
      if (admin == 1){
        // Creo el boton para eliminar comentario
        icono.classList.add("far");
        icono.classList.add("fa-trash-alt");
        icono.classList.add("fa-2x");
        deleteButton.appendChild(icono);
        divContainer.appendChild(deleteButton);
        deleteButton.addEventListener("click", () => deleteComment(id));
        deleteButton.style.display = "block";
        console.log('admin')
      }
    }
  }
}

function addComent(){
  // Tomo los input radio del formulario
  let radios = document.getElementsByName("estrellas");
  // Asigno una variable vacía
  let puntaje;
  // Recorro todos los input radio con el nombre "estrellas"
  for (let i=0; i<radios.length; i++){
    // Me detengo en aquel que esté checked
    if (radios[i].checked){
      // A la variable declarada antes del for le asigno el valor del radio seleccionado
      puntaje = radios[i].value;
    }
  }

    let comentario = {
      "comentario": document.getElementById("comment").value,
      "puntaje": puntaje,
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
    .then(document.querySelector("#commentForm").reset())
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