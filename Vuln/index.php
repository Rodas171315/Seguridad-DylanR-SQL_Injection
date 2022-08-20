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
    print "Hola curso <br>";
    print "Este es un sitio web vulnerable";
    ?>

    <br><br>
    Formulario de Busqueda
    <form action="Vista/hallazgos.php" method="get">
        <label><input type="text" name="buscador"></label>
        <input type="submit" name="buscando" value="Encontrar">
    </form>

    <br><br>
    Inicio de Sesion
    <form action="Vista/perfil.php" method="get">
        <label>Usuario: <input type="text" name="nickname"></label><br />
        <label>Contra: <input type="password" name="contra"></label><br />
        <input type="submit" name="ingresando" value="Entrar">
    </form>

    <br><br>
    Registro
    <form action="Vista/registro.php" method="post">
        <label>Usuario: <input type="text" name="nickname"></label><br />
        <input type="submit" name="registrando" value="Registrar">
    </form>

    <br><br>
    <a href="../Secure/">
        <button>Version Segura</button>
    </a>
</body>
</html>