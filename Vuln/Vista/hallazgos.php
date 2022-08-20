<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web Vulnerable</title>
</head>
<body>
    <?php

    require ("../Modelo/conexionDB.php");

    // Variables para realizar el query de busqueda, obteniendo datos del formulario.
    $busqueda = $_GET["buscador"];

    if($busqueda=="")
    {
        header("Location: ../index.php");
        exit();
    }
    
    // Query para manipular la base de datos.
    $consulta="SELECT `nombre`, `apellido` FROM `datos_usuarios` WHERE `nombre` LIKE '%$busqueda%';";
    // Obtiene los resultados del query.
    $resultados=mysqli_query($conexion,$consulta);

    // Cierra la conexion con la base de datos.
    mysqli_close($conexion);

    // Verifica si se ha realizado la busqueda.
    if($resultados==false)
    {
        echo "Error en la consulta.<br />";
    }
    else
    { 
        echo "Se realizo la busqueda correctamente.<br />";
    }

    echo "Query: {$consulta}<br />";
    echo "Busqueda: {$busqueda}<br />";

    // Imprimir los resultados
    while( $filas = mysqli_fetch_assoc( $resultados ) ) {
        // Obtener valores
        $nombre = $filas["nombre"];
        $apellido = $filas["apellido"];

        // Retroalimentacion para demo
        echo "<pre>Nombre: {$nombre}<br />Apellido: {$apellido}</pre>";

        /* Nota: La consulta SQL utiliza datos crudos controlados directamente por un atacante. 
        Todo lo que necesitan hacer es escapar de la consulta y luego pueden ejecutar cualquier 
        consulta SQL que deseen. */
    }

    ?>
</body>
</html>