"use strict"

let numero = document.getElementById('inputEscondido').value;
const tbody = document.getElementById('tbody');
let nombreUsuario = document.getElementById('usuarioConectado');
const borrar = "api/borrarComentario";
let noComent = document.getElementById('noComent');

document.addEventListener("DOMContentLoaded",()=>{

   getComentarios();
   
   document.getElementById("apiForm").addEventListener("submit",e=>{
       e.preventDefault();
       agregarComentario();
    })
   
    

})

function getComentarios(){
    fetch("api/comentarios" +'/' + numero)
    .then(response => response.json())
    .then(comentarios => showComentarios(comentarios))
    .catch(error => console.log(error));
}

function showComentarios(comentarios){
   if(comentarios.length!=0){
      removerSinComentarios();
      limpiarTabla();
      for(let coment of comentarios){
         let boton = document.createElement("button");
         boton.innerText = "Borrar";
         let nodotr = document.createElement("tr");
         let nodotd = document.createElement("td");
         let nodotd1 = document.createElement("td");
         let nodotd2 = document.createElement("td");
         nodotd1.innerHTML = `${coment.comentario}`;     
         nodotd.innerHTML = `${coment.puntaje}`;
         nodotr.id = coment.id;
         if(nombreUsuario !=null){
            boton.addEventListener('click',e=>eliminar(coment.id));
            nodotr.appendChild(nodotd1);
            nodotr.appendChild(nodotd);
            nodotd2.appendChild(boton);
            nodotr.appendChild(nodotd2);
         }else{
            nodotr.appendChild(nodotd1);
            nodotr.appendChild(nodotd);
            nodotr.appendChild(nodotd2);
         }
         tbody.appendChild(nodotr);
   }  
   
   }else{
      sinComentarios();
   }
}
   
   function eliminar(id){
      fetch(borrar + "/"  + id, {
         "method": "DELETE",
         "mode": 'cors',
      })  .then(response => response.json())
         .then(function () {
             getComentarios();
      }).catch(function (e) {
         console.log(e)
      })
   }

   function limpiarTabla(){
      tbody.innerHTML = "";
   }

   function sinComentarios(){
      noComent.classList.add("ocultar");
   }
   function removerSinComentarios(){
      noComent.classList.remove("ocultar");
   }

   function agregarComentario() {
      let comentario = document.getElementById('comentarioPost');
      let puntaje = document.getElementById('puntajePost');
      let id = document.getElementById('idComentario');
      if((comentario.value && puntaje.value) != ""){
          let data = {
              comentario: comentario.value,
              puntaje: puntaje.value,
              id_comentario: id.value
          }
          fetch('api/comentarios', {
              "method": "POST",
              "headers": { "Content-Type": "application/json" },
              "body": JSON.stringify(data)
          })
              .then(response => response.json())
              .then(function () {
                  getComentarios()
              }).catch(function (e) {
                  console.log(e)
              })
      }
  }
