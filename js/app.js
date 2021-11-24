"use strict"

const url = "http://localhost/TP-WEB2-PARTE1-2021/api/comentarios";
let app = new Vue({
    el: "#app",
    data: {
        comentarios: []  
    }
});

let form = document.querySelector('#apiForm');

if(form){
    form.addEventListener('submit', cargarDatos);
    async function cargarDatos(e){
        e.preventDefault();
        
        let formData = new FormData(form);
        let comentario = formData.get('comentario');
        let puntaje = formData.get('puntaje');

        console.log(comentario, puntaje);

        let identificador = document.querySelector('#id');
        let id = identificador.dataset.id;

        let coment = {
            "id_comentario" : id,
            "comentario" : comentario,
            "puntaje" : puntaje
        }
        try{
            await fetch(url,{
                "method" : "POST",
                "headers" : {"Content-type" : "application/json"},
                "body" : JSON.stringify(coment)
            });
            
        }
        catch(error){
            console.log(error);
        }
        mostrarComentario();
    }
}

async function mostrarComentario(){ 
    let identificador = document.querySelector('#id');
    let id = identificador.dataset.id;
    try{
        let response = await fetch(`${url}/${id}`);
        let res = await response.json();
        
        app.comentarios = res;
    }
    catch(error){
        console.log(error);
    }
}

/*function borrarComentario(){
   
    let id = this.dataset.iden;
    console.log(id);
    
    try{
        await fetch (`${url}/${id}`, {
            "method" : "DELETE"
        });
    }
    catch(error){
        console.log(error);
    }
    mostrarComentario();
}*/




mostrarComentario();