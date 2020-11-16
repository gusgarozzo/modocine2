document.addEventListener("DOMContentLoaded", function(){
    "use strict";
    let urlAPI = "api/comentarios";
    let btn = document.querySelector("#btn_send");

    let datos = [];
    
    //Añade funcionalidad al boton comentar
    btn.addEventListener('click', function addComment(){       
        //Creamos el objeto comentario para enviar, con los atributos de la DB
        const comentario = {
          mensaje: document.querySelector("#comment").value,
          puntaje:document.querySelector("#puntaje").value,
          usuario_id: document.querySelector("#usuario_id").getAttribute("data"),
          pelicula_id: document.getElementById("pelicula_id").value
        }
      
        fetch(urlAPI,{
          method: 'POST',
          headers: { "Content-Type": "application/json"},
          body: JSON.stringify(comentario)
        })
        .then(response => response.json()) // No ejecuta, consola lanza error "Unexpected end of JSON input"
        .then(task => datos.push(comentario))
        .catch(error => console.log("error"))
    })
})
  
  
