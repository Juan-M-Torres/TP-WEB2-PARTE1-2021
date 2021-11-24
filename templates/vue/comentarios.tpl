{literal}
    <ul class="list-group" v-for="coment in comentarios">
        <li v-if="coment.id_comentario" class="list-group-item">{{coment.comentario}} | {{coment.puntaje}}</li>
    </ul>
{/literal}