'use strict'

let dato = document.getElementById("inputGamer");
let seleccion = document.getElementById('seleccion');


if(dato.value == 0){
    seleccion.value = "no";
}else{
    seleccion.value = "si";
}
