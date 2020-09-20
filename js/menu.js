document.addEventListener("DOMContentLoaded", menuDesplegable);

function menuDesplegable(){
    "use strict"
    let menu = document.getElementById("menu");
    let btnAbrir = document.getElementById("btn-abrir");
    btnAbrir.addEventListener("click", abrirMenu);

    function abrirMenu(){
        menu.classList.toggle("visible")
    }
}