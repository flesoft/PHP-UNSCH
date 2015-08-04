<?php
include_once('usuario.php');
//phpinfo();
/* otro comentario */
$var = 1;
echo $var;
$var = '<br/>hola mundo';
echo $var;
$var = true;
echo $var;

if ($var == 3) {
    echo '<ul>
    <li>1a'.$var.'</li>
    <li>2a</li>
</ul>';
} else {
    echo 'si es 3';
}
?>
<?php if ($var == 2 ): ?>
    <ul>
        <li>1c</li>
        <li>2d</li>
    </ul>
<?php else: ?>
    <p>parrafo</p>
<?php endif; ?>

<?php
//for ($i = 0; $i < 10; $i++) :
//    echo 'este numero es ' . $i . '<br/>';
//endfor;
$array = array(1,2,3,4,5,6,7,8,9);
//print_r($array);
//$array = array('a'=>'b');
//$array[9] = 10;
//$array[0]='a';

foreach($array as $key=>$value){    
    echo 'pos '.$key.' valor '.$value.'<br/>';
    if($value==3)
        break;
    
}
$i=0;
while($i<10){
    echo 'pos '.$i;
    if($i==5)
        break;
    $i++;
};

switch($var){
   case 1:
       echo 'esto es 1<br/>';
       break;
   case 2:
       echo 'esto es 2<br/>';
   default:
       echo 'esto es por defecto';
}


function miNumero($var){
    echo 'mi numero '.$var;
}

miNumero(2);
echo '---------------<br>';
$var1=1;
$var2=true;
//|| = or
//&& = and
//=
if($var1 == ($var2=false)){
    echo $var1/$var2;
}
$varStr = 'este es un curso1';
echo strlen($varStr).' caracteres tiene mi texto<br/>';
$palabras = explode(' ',$varStr);
echo $palabras[0];
$variable2 = 'este es variable2';
$var = 'variable2';
$$var;
echo $$var;

$usuario = new Usuario();

$miUsuario = array('nombre_usuario'=>'juancho','clave'=>'12345','nombres'=>'juan','apellidos'=>'perez');

if($usuario->guardar($miUsuario)){
    echo '<br/> los datos de '.$miUsuario['nombres'].' se guardo correctamente';
}else{
    echo '<br/>no se pudo guardar los datos de '.$miUsuario['nombres'];
}