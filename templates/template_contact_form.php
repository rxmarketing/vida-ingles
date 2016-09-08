<form method="post" id="msgFrm" name="msgFrm" role="form" class="form">
<label for="msg_nombres" class="label">Nombre:</label>
<input type="text" name="msg_nombres" id="msg_nombres" class="form-control" placeholder="Nombre"/>
<label for="msg_apellidos" class="label">Apellido:</label>
<input type="text" name="msg_apellidos" id="msg_apellidos" class="form-control" placeholder="Apellido"/>
<label for="msg_email" class="label">Correo electrónico</label>
<input type="email" name="msg_email" id="msg_email" class="form-control" placeholder="Escribe tu correo electrónico"/>
<label for="msg_asunto" class="label">Asunto:</label>
<select name="msg_asunto" id="msg_asunto" class="form-control">
 <option value="" disabled selected>Elige asunto de la lista</option>
 <option value="broken link">Broken link</option>
 </select>
<label for="msg_mensaje" class="label">Mensaje:</label>
<textarea name="msg_mensaje" id="msg_mensaje" placeholder="Escribe aqui tu mensaje" cols="30" rows="6" class="form-control">
</textarea>
<input type="hidden" name="msg_logusername" id="msg_logusername" value=""/>
<input type="hidden" name="msg_logemail" id="msg_logemail" value=""/>
<button id="msgBtn" class="btn">Enviar</button>
<span id="aviso"></span>
</form>
