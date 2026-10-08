<?php

if(isset($_POST["btonEnviar"])){

$error_numero = !is_numeric($_POST["numero"]) || $_POST["numero"]<1 || $_POST["numero"]>10;

$error_formulario = $error_numero;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 ficheros</title>
    <style>
    .error{color:red}
    </style>
</head>
<body>
<h1>Creador de tablas</h1>
<form action="ejercicio1.php" method="post" enctype="multipart/form-data">

<p>
<label for="numero">Introduce un numero del 1 al 10:</label>
<input type="text" id="numero" name="numero" value="<?php if(isset($_POST["numero"])) echo $_POST["numero"]; ?>">
<?php
if(isset($_POST["btonEnviar"]) && $error_formulario){
    echo "<span class='error'> El numero introducido no es valido </span>";
}
?>
</p>
<p>
<button type="submit" name="btonEnviar">Crear Fichero</button>
</p>
</form>
<?php
if(isset($_POST["btonEnviar"]) && !$error_formulario){
 $nombre_fichero = __DIR__ ."/Tablas/tabla_".$_POST["numero"].".txt";  
 
 if(!file_exists($nombre_fichero)){
    
 $tabla= fopen($nombre_fichero,"w");

  if ($tabla === false) {
        die("ERROR: No se ha podido abrir el fichero para escribir. </body></html>");
    }

     fputs($tabla, "0 X".$_POST["numero"]."=".(0*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "1 X".$_POST["numero"]."=".(1*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "2 X".$_POST["numero"]."=".(2*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "3 X".$_POST["numero"]."=".(3*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "4 X".$_POST["numero"]."=".(4*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "5 X".$_POST["numero"]."=".(5*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "6 X".$_POST["numero"]."=".(6*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "7 X".$_POST["numero"]."=".(7*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "8 X".$_POST["numero"]."=".(8*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "9 X".$_POST["numero"]."=".(9*$_POST["numero"]).PHP_EOL);
     fputs($tabla, "10 X".$_POST["numero"]."=".(10*$_POST["numero"]).PHP_EOL);
    

     fclose($tabla);
     $tabla=fopen($nombre_fichero,"r");
     while($linea=fgets($tabla)){
         echo "<p>".$linea."</p>";
     }

     fclose($tabla);
 }
 else {
 

 $tabla_entera = file_get_contents($nombre_fichero);
 echo "<pre>".$tabla_entera."</pre>";

 

 }
}

?>
</body>
</html>