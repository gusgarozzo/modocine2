document.addEventListener('DOMContentLoaded', tablaDinamica);

function tablaDinamica() {
  event.preventDefault();
  "use strict";
  // DECLARO VARIABLES PARA LOS BOTONES Y SUS EVENTOS CLICK
  let btnRandom = document.getElementById("btn-random");
  btnRandom.addEventListener("click", agregarVarios);
  let btnAgregar = document.getElementById("btn-agregar");
  btnAgregar.addEventListener("click", enviarForm);
  let url = "https://web-unicen.herokuapp.com/api/groups/30GarozzoRios/tablacine/";
  let tabla = [];
  window.onload = cargarTabla;



  // DEFINO VARIABLES PARA LA TABLA
  let boleteria = document.getElementById("boleteria");
  let tbody = document.createElement("tbody");
  let total = 0;
  let subtotal = 0;
  let tr, td1, td2, td3, td4, td5, td6;
  let total_head = document.getElementById("total");

  // INSERTO EL TBODY EN LA TABLA
  boleteria.appendChild(tbody);

  ////////* CARGA DE DATOS ALEATORIA AL ABRIR PÁGINA *////////
  async function cargarTabla() {
    let container = document.querySelector("#use-ajax");
    container.innerHTML = "<h1>Loading...</h1>";
    try {
      let r = await fetch(url);
      let t = await r.json();
      t = t.tablacine;
      for (let i = 0; i < t.length; i++) {
        let entrada = t[i].thing;
        // CREO ELEMENTOS DE LA TABLA
        tr = document.createElement("tr");
        tr.setAttribute("id", "filas")
        td1 = document.createElement("td");
        td2 = document.createElement("td");
        td3 = document.createElement("td");
        td4 = document.createElement("td");
        td5 = document.createElement("td");
        td6 = document.createElement("td");

        if (entrada.asientos >= 3) {
          tr.className = "oferta";
        }

        // INSERTO LA FILA EN EL TBODY
        tbody.appendChild(tr);

        // INGRESO LOS ELEMENTOS DEL OBJETO EN LA TABLA
        td1.innerText = entrada.asientos >= 3 ? entrada.pelicula.toUpperCase() : entrada.pelicula;
        td2.innerText = entrada.asientos;
        td3.innerHTML = entrada.complejo;
        td4.innerHTML = entrada.precio;

        subtotal = entrada.asientos * entrada.precio;
        subtotal = entrada.asientos >= 3 ? subtotal * 0.8 : subtotal;

        td5.innerHTML = subtotal;
        let id = t[i]._id;
        //console.log(id);

        // BOTONES PARA EDITAR Y BORRAR FILA EN TABLA Y EN LA API
        let btn_editar = document.createElement("button");
        btn_editar.id = "btn-editar-" + i;
        btn_editar.addEventListener("click", () => editarFila(id));
        btn_editar.className += "fas fa-edit";
        td6.appendChild(btn_editar);

        let btn_borrar = document.createElement("button");
        btn_borrar.id = "btn-eliminar-" + i;
        btn_borrar.addEventListener("click", () => borrarFila(id));
        btn_borrar.className += "fas fa-trash-alt";
        td6.appendChild(btn_borrar);

        total += subtotal;
        total_head.innerText = total;


        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        tr.appendChild(td6);
      }
      container.innerHTML = "";

      if (!r.ok) {
        container.innerHTML = "<h1>Error - Failed URL!</h1>";
      }
    } catch (response) {
      container.innerHTML = "<h1>Connection error</h1>";
    };
  }

  ////////* AGREGA VARIOS ELEMENTOS ALEATORIOS A LA TABLA *////////
  function agregarVarios() {
    enviarServidor(1, "A Quiet Place 2", 2, "Cinemacenter", 200, "agregar_varios", false);
    enviarServidor(2, "Bad Boys 3", 1, "Cinemark", 200, "agregar_varios", false);
    enviarServidor(3, "Black Widow", 1, "Hoyts", 200, "agregar_varios", true);

    cargarTabla();
  }

  // AGREGAR DE A 1 VALOR
  function enviarForm() {
    // DECLARO VARIABLES PARA LOS INPUT
    let pelicula = document.getElementById("pelicula").value;
    let asientos = document.getElementById("asientos").value;
    let complejo = document.getElementById("complejo").value;
    let valor = document.getElementById("valor").value;
    let identificador = document.getElementById("id").value;
    let operacion = document.getElementById("operacion").value;
    //console.log(identificador + " , " + operacion)
    enviarServidor(identificador, pelicula, asientos, complejo, valor, operacion, true);
  }

  // SI ES AGREGAR O AGREGAR VARIOS, SE EJECUTA POST. SI ES EDITAR, SE EJECUTA PUT
  async function enviarServidor(id, pelicula, asientos, complejo, valor, operacion, refreshTable) {
    event.preventDefault();
    let container = document.querySelector("#use-ajax");
    container.innerHTML = "<h1>Agregando Entradas...</h1>";
    let nuevo = new Object();
    nuevo.pelicula = pelicula;
    nuevo.asientos = asientos;
    nuevo.complejo = complejo;
    nuevo.precio = valor;
    let req = new Object();
    req.thing = nuevo;

    let url_int = url;
    let method = "POST";
    if (operacion == "editar") {
      url_int = url + id;
      method = "PUT";
    }
    try {
      let response = await fetch(url_int, {
        "method": method,
        "headers": { "Content-Type": "application/json" },
        "body": JSON.stringify(req)
      }
      );
      if (response.ok) {
        container.innerHTML = "";
        if (refreshTable) {
          borrarTabla();
          cargarTabla(event);
        }
      }
      else
        container.innerHTML = "<h1>Error - Failed URL!</h1>";
    }
    catch (response) {
      container.innerHTML = "<h1>Connection error</h1>";
    };
  }

  //TRAE LOS ELEMENTOS SELECCIONADOS Y LOS IMPRIME EN EL INPUT, GUARDANDO EL ID. AL AGREGAR, SE EJECUTA ENVIARSERVIDOR CON METODO PUT
  async function editarFila(id) {
    let container = document.querySelector("#use-ajax");
    container.innerHTML = "<h1>Editando Fila...</h1>";
    try {
      let response = await fetch(url + id, {
        "method": "GET",
        "headers": { "Content-Type": "application/json" }
      }
      );
      if (response.ok) {
        let t = await response.json();
        console.log(t);
        t = t.information.thing;
        console.log(t);


        let pelicula = document.getElementById("pelicula");
        let asientos = document.getElementById("asientos");
        let complejo = document.getElementById("complejo");
        let valor = document.getElementById("valor");
        let identificador = document.getElementById("id");
        let operacion = document.getElementById("operacion");

        pelicula.value = t.pelicula;
        asientos.value = t.asientos;
        complejo.value = t.complejo;
        valor.value = t.precio;
        operacion.value = "editar";
        identificador.value = id;
      }
      else
        container.innerHTML = "<h1>Error - Failed URL!</h1>";
    }
    catch (response) {
      container.innerHTML = "<h1>Connection error</h1>";
    };
  }

  async function borrarFila(id) {
    let container = document.querySelector("#use-ajax");
    container.innerHTML = "<h1>borrando fila...</h1>";
    try {
      let response = await fetch(url + id, {
        "method": "DELETE",
        "headers": { "Content-Type": "application/json" }
      }
      );
      if (response.ok) {
        container.innerHTML = "";
        borrarTabla();
        cargarTabla();
      }
      else
        container.innerHTML = "<h1>Error - Failed URL!</h1>";
    }
    catch (response) {
      container.innerHTML = "<h1>Connection error</h1>";
    };
  }

  // BORRA TABLA, PERO NO MODIFICA EL CONTENIDO DE LA API
  function borrarTabla() {
    let items = tbody.querySelectorAll("tr");

    for (let item of items) {
      item.remove();
      tabla.pop();
    }
    total = 0;
    total_head.innerText = total;

  }

  // FILTROS
  async function filtrarPorSala() {
    event.preventDefault();
    let container = document.querySelector("#use-ajax");
    let mensaje = document.querySelector("#mensaje");
    let filtro = document.querySelector("#filtro").value;
    let filas = 0;

    //console.log(filtro)
    try {
      let r = await fetch(url)
      let json = await r.json();
      for (let i = 0; i < json.tablacine.length; i++) {
        json.tablacine[i].thing.complejo = json.tablacine[i].thing.complejo.toLowerCase();
        filtro = filtro.toLowerCase();
        let tr = document.querySelectorAll("#filas")
        tr[i].classList.remove("filtrado");
        tr[i].classList.add("filtro-oculto");
        if (json.tablacine[i].thing.complejo === filtro) {
          tr[i].classList.add("filtrado");
          tr[i].classList.remove("filtro-oculto");
          filas++;
        }
      }
      if (filas === 0) {
        mensaje.classList.remove("filtro-oculto");
      }

      if (!r.ok) {
        container.innerHTML = "<p> Error de conexión. Intente nuevamente </p>"
      }
    } catch (e) {
      console.log(e);
    }
  }

  // EJECUTA LA FUNCION DE FILTRAR
  let btnFiltrar = document.querySelector("#buscar")
  btnFiltrar.addEventListener("click", filtrarPorSala);


  let btnRestablecer = document.querySelector("#reset")
  btnRestablecer.addEventListener("click", restablecerTabla)

  // RESETEA LA TABLA (NO MODIFICA LA API).
  function restablecerTabla() {
    borrarTabla();
    cargarTabla();
  }

  // CADA 20 SEGUNDOS LA TABLA SE RESTABLECE Y RECARGA CON CAMBIOS REALIZADOS EN OTRA SESIÓN SIMULTANEA
  setInterval(restablecerTabla, 20000)


}










