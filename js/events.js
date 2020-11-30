"use strict";

function confirmDelete() {
    let response = confirm("Estas seguro que deseas eliminar este registro?");

    if (response == true){
        return true;
    }else{
        return false;
    }
}