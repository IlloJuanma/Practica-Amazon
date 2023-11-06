<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
=======
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
    <?php require 'funciones/depurar.php' ?>
    <?php require 'funciones/base_datos_tienda.php' ?>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);
<<<<<<< HEAD
        $temp_contrasena = depurar($_POST["contrasena"]);
=======
        $contrasena = depurar($_POST["contrasena"]);
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
        $temp_nacimiento = depurar($_POST["fecha_nacimiento"]);

        # Validación de usuario
        if (!strlen($temp_usuario) > 0) {
            $err_usuario = "El usuario es obligatorio";
        } else {
            $patron = "/^[A-Za-z_]{4,12}$/";
            if (!preg_match($patron, $temp_usuario)) {
                $err_usuario = "El usuario solo puede tener letras y '_', sin espacios";
            } else {
                $usuario = $temp_usuario;
            }
        }

        # Validación de contraseña
        if (!strlen($temp_contrasena) > 0) {
            $err_contrasena = "La contraseña es obligatoria";
        } else {
            if (strlen($temp_contrasena) > 255) {
                $err_contrasena = "La contraseña no puede tener más de 255 caracteres";
            } else {
                $contrasena = $temp_contrasena;
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
            }
<<<<<<< HEAD
=======

>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
        }

        # Validación fecha nacimiento
        if (strlen($temp_nacimiento) == 0) {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        } else {
            $fecha_actual = date("Y-m-d");
            list($anyo_actual) = explode("-", $fecha_actual);
            list($anyo) = explode("-", $temp_nacimiento);
            if (($anyo_actual - $anyo > 12) && ($anyo_actual - $anyo < 120)) {
                $fecha_nacimiento = $temp_nacimiento;
            } else {
                $err_fecha_nacimiento = "La fecha de nacimiento no es válida (menor de 120 años y mayor a 12 años)";
            }
        }
    }
    ?>

    <div class="container">
        <div class="col-9">
            <h2>Introduce nuevo Usuario</h2>
            <div class="mb-3">
                <form action="" method="POST">
                    <label class="form-label">Usuario</label>
                    <input class="form-control" type="text" name="usuario">
<<<<<<< HEAD
                    <?php if (isset($err_usuario)) echo $err_usuario ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
                <?php if (isset($err_contrasena)) echo $err_contrasena ?>
=======
                    <?php if(isset($err_usuario)) echo $err_usuario ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="text" name="contrasena">
                <?php if(isset($err_contrasena)) echo $err_contrasena ?>
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
            </div>
            <div class="mb-3">
                <label class="form-label">Fecha de nacimiento</label>
                <input class="form-date" type="date" name="fecha_nacimiento">
<<<<<<< HEAD
                <?php if (isset($err_fecha_nacimiento)) echo $err_fecha_nacimiento ?>
            </div>
            <input type="submit" value="Registrar">
            </form>

            <?php
            if (isset($usuario) && isset($contrasena) && isset($fecha_nacimiento)) {

                $sql1 = "INSERT INTO usuarios (usuario, contrasena, fechaNacimiento)
                                                
                        VALUES('$usuario', '$contrasena_cifrada', '$fecha_nacimiento')";

                $sql2 = "INSERT INTO cestas (usuario, precioTotal)
                        VALUES('$usuario', '0')";
                
                $conexion -> query($sql1);
                $conexion -> query($sql2);
            }
            ?>

=======
                <?php if(isset($err_fecha_nacimiento)) echo $err_fecha_nacimiento ?>
            </div>
            <input type="submit" value="Registrar">
            </form>
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
        </div>
    </div>
</body>

</html>