<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
//modos de apertura
//r-->lectura;w-->escritura;a-->añadir
// si le ponemos el + todos añaden lo que le falta
// $fd=fopen("prueba.txt","w"); //para abrir un fichero en modo escritura (o crearlo)

//siempre que se escribe un fichero hay que cerrarlo
//modo escribir(o reescribir o crear)
if(file_exists("prueba.txt")){
    $fd=fopen("prueba.txt","w") //con w borra todo lo que haya en el archivo para escribir lo que pongas
}
else{
    die("<p>El fichero 'prueba.txt' no existe </p></body></html>"); //con die la página termina, muere en esta linea por eso tenemos que cerrar manualmente el body y el html
}

//si el fichero existe sigo por aqui por lo que vamos a vers como escribirlo con fputs o fwrite

fputs($fd,"Esta es mi primera linea".PHP_EOL) //le añadimos una constante que escribe un final de linea
fputs($fd,"Esta es mi segunda linea".PHP_EOL)
fclose($fd); //cierra el fichero

// modo añadir
if(file_exists("prueba.txt")){
    $fd=fopen("prueba.txt","a") //con a añade lo que escribas a lo que el archivo ya tenia
}
else{
    die("<p>El fichero 'prueba.txt' no existe </p></body></html>"); //con die la página termina, muere en esta linea por eso tenemos que cerrar manualmente el body y el html
}

//si el fichero existe sigo por aqui por lo que vamos a vers como escribirlo con fputs o fwrite

fputs($fd,"Esta es mi tercera linea".PHP_EOL) //le añadimos una constante que escribe un final de linea
fputs($fd,"Esta es mi cuarta linea".PHP_EOL)
fclose($fd);


if(file_exists("prueba.txt")){
    $fd=fopen("prueba.txt","r") //con r recorremos el archivo
}
else{
    die("<p>El fichero 'prueba.txt' no existe </p></body></html>"); //con die la página termina, muere en esta linea por eso tenemos que cerrar manualmente el body y el html
}
//leer con fgets

$linea=fgets($fd); //fgets dará un String que corresponde a la primera linea y coloca el puntero en la siguiente

$linea=fgets($fd); //por eso si pongo otro aqui este ya esta en la segunda linea y al acabar pasaría a la tercera
//en el caso del que fichero termine, escribe una linea vacía pero no produce error

fseek($fd,0); //mandamos al puntero de nuevo al principio

//para recorrerlo del tiron
while($linea=fgets($fd)) // mientras esta asignacion tenga exito, imprime la linea 
    {
    echo "<p>".$linea."</p>";
}


//otra forma de recorrelo linea a linea

while(!feof($fd)) //mientras no sea el final del fichero (end of file) imprime la linea
    {
    echo "<p>".$linea."</p>";
}

//para leer el fichero entero de un tiron 
$todo=file_get_contents("prueba.txt");
echo "<pre>".$todo."</pre>";

//y para crear un archivo del tiron
file_put_contents($todo,"prueba2.txt"); //lo que haya en $todo lo va escribir en un nuevo archivo llamado "prueba2.txt"

fclose($fd);


//para borrar un fichero
unlink("prueba.txt");
?>
</body>
</html>