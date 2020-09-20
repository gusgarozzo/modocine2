document.addEventListener('DOMContentLoaded', captcha)


function captcha() {
    "use strict"
    let random = Math.floor(Math.random(10000 - 100000) * 100000);
    let captcha = document.getElementById('captcha');
    captcha.value = random;

    function validacion() {
        event.preventDefault()
        let usuario = document.getElementById('validar').value;
        let mensaje = document.getElementById('mensaje');
        if (usuario != random) {
            mensaje.innerHTML = "<p>" + "Captcha incorrecto" + "</p>";
        } else {
            mensaje.innerHTML = "<p>" + "Muchas gracias!" + "</p>";
        }


    }


    let boton = document.getElementById('boton');
    boton.addEventListener('click', validacion);
}
