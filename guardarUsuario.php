<h1>Mi formulario usuario</h1>
<form method="post">
    <div>nombre de usuario: <input type="text" name="usuario[nombre_usuario]" value="" /></div>
    <div>clave <input type="text" name="usuario[clave]" value="" /></div>
    <div>apellidos <input type="text" name="usuario[apellidos]" value="" /></div>
    <div>nombres<input type="text" name="usuario[nombres]" value="" /></div> 
    <div><input type="submit" value="enviar" /></div>
</form>
<?php
include_once('usuario.php');

if (isset($_POST['usuario'])) {
    $usuario = new Usuario();
    if ($usuario->guardar($_POST['usuario'])) {
        echo '<br/> los datos de ' . $_POST['usuario']['nombres'] . ' se guardo correctamente';
    } else {
        echo '<br/>no se pudo guardar los datos de ' . $_POST['usuario']['nombres'];
    }
}
?>

