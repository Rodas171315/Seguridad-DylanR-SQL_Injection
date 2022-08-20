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
    $nickname = $_GET["nickname"];
    $contra = $_GET["contra"];

    if($nickname=="" || $contra=="")
    {
        header("Location: ../index.php");
        exit();
    }
    
    // Query para manipular la base de datos.
    $consulta="SELECT `nickname`, `contra` FROM `usuarios` WHERE `nickname` = '$nickname' AND `contra`= '$contra';";
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

    // Imprimir los resultados
    while( $filas = mysqli_fetch_assoc( $resultados ) ) {
        // Obtener valores
        $nickname = $filas["nickname"];
        $contra = $filas["contra"];

        echo "<pre>Bienvenido $nickname, estos son tus datos: <br />";
        // Retroalimentacion para demo
        echo "<pre>Usuario: {$nickname}<br />Contra: {$contra}</pre>";
    }

    ?>
</body>
</html>