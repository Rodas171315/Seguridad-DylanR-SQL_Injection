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
    $consulta=("SELECT `nombre`, `apellido` FROM `datos_usuarios` WHERE `nombre` LIKE ? ;");
    // Prepara la consulta SQL y devuelve un objeto
    $resultados=mysqli_prepare($conexion,$consulta);
    // Verifica que el tipo de dato corresponda con el deseado
    $exito=mysqli_stmt_bind_param($resultados, "s", $busqueda);
    // Ejecuta la consulta
    $exito=mysqli_stmt_execute($resultados);

    echo "Query: {$consulta}<br />";
    echo "Busqueda: {$busqueda}<br />";

    // Verifica si se ha realizado la busqueda.
    if($exito==false)
    {
        echo "Error en la consulta.<br />";
    }
    else
    { 
        echo "Se realizo la consulta correctamente.<br />";
        // Asocia las variables al resultado
        $exito=mysqli_stmt_bind_result($resultados,$nombre,$apellido);

        // Leer e imprimir los resultados
        while(mysqli_stmt_fetch( $resultados ) ) {
            echo "<pre>Nombre: {$nombre}<br />Apellido: {$apellido}</pre>";
        }
        mysqli_stmt_close( $resultados );

        /* Nota: Las consultas ahora son consultas parametrizadas (en lugar de ser dinámicas). 
        Esto significa que la consulta ha sido definida por el desarrollador y se ha distinguido 
        qué secciones son código y el resto son datos. */
    }

    // Cierra la conexion con la base de datos.
    mysqli_close($conexion);

    ?>
</body>
</html>