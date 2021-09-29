

{include file="header.tpl"}



<form action="editarGabinete" method="POST">
<input type="text" name="nombre" placeholder="Marca del Gabinete" required>
<input type="text" name ="marca" placeholder="Nombre del gabinete" required>
<select name="gamer">
<option value="si">Si</option>
<option value="no">No</option>
</select>
<input type="submit" value="Editar">
</form>  


{include file="footer.tpl"}

