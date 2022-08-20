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

    // Variables para realizar el query de registro, obteniendo datos del formulario.
    $nickname = $_POST["nickname"];

    if($nickname=="")
    {
        header("Location: ../index.php");
        exit();
    }
    
    // Query para manipular la base de datos.
    $consulta="INSERT INTO `datos_usuarios`(`nickname`) VALUES ('$nickname');";

    echo "Query: {$consulta}<br />";

    // Obtiene los resultados del query.
    if (mysqli_multi_query($conexion, $consulta)) {
        do
        {
            // Almacena el resultado del primer query
            if ($resultados = mysqli_store_result($conexion)) 
            {
                // Verifica si se ha realizado el cambio.
                if($resultados==false)
                {
                    echo "Error en la consulta.<br />";
                }
                else
                { 
                    echo "Se realizo el cambio correctamente.<br />";
                }
                while ($fila = mysqli_fetch_row($resultados)) 
                {
                    printf("%s\n", $fila[0]);
                }
                mysqli_free_result($resultados);
            }
            // Division por si hay mas consultados
            if (mysqli_more_results($conexion))
            {
                printf("-------------\n");
            }
        }
        //Prepara el resultado del siguiente query 
        while (mysqli_next_result($conexion));
    }

    // Cierra la conexion con la base de datos.
    mysqli_close($conexion);

    ?>
</body>
</html>