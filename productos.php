<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'funciones/depurar.php' ?>
    <?php require 'funciones/base_datos_tienda.php' ?>
</head>

<body>
    <div class="container">
<<<<<<< HEAD
=======

>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $temp_nombre = depurar($_POST["nombre"]);
            $temp_precio = depurar($_POST["precio"]);
            $temp_descripcion = depurar($_POST["descripcion"]);
            $temp_cantidad = depurar($_POST["cantidad"]);

<<<<<<< HEAD
            # Imagen
            $nombre_imagen = $_FILES["imagen"]["name"];
            $ruta_temporal = $_FILES["imagen"]["tmp_name"];
            $ruta_final = "img/" . $nombre_imagen;
            move_uploaded_file( $ruta_temporal, $ruta_final );

=======
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
            #Validación de nombre
            if (strlen($temp_nombre) == 0) {
                $err_nombre = "El nombre es obligatorio";
            } else {
                if (strlen($temp_nombre) > 40) {
                    $err_nombre = "El nombre no puede tener más de 
                    40 caracteres";
                } else {
<<<<<<< HEAD
                    $patron = "/^[a-zA-Z0-9áÁéÉíÍóÓúÚñÑ ]{0,40}$/";
=======
                    $patron = "/^[a-zA-Z0-9 ]{0,40}$/";
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
                    if (!preg_match($patron, $temp_nombre)) {
                        $err_nombre = "El nombre solo puede tener letras ó números";
                    } else {
                        $temp_nombre = strtolower($temp_nombre);
                        $temp_nombre = ucwords($temp_nombre);
                        $nombre = $temp_nombre;
                    }
                }

            }

            #Validar el precio
            if (strlen($temp_precio) == 0) {
                $err_precio = "El precio es obligatorio";

            } else {
                if ($temp_precio > 99999.99) {
                    $err_precio = "El precio no debe ser mayor a 99999,99";
                } else if ($temp_precio < 0) {
                    $err_precio = "El precio no debe ser menor a 0";
                } else {
                    $precio = $temp_precio;
                }
            }

            #Validar la descripción
            if (strlen($temp_descripcion) == 0) {
                $err_descripcion = "La descripción es obligatoria";
            } else {
                if (strlen($temp_descripcion) > 255) {
                    $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                } else {
                    $descripcion = $temp_descripcion;
<<<<<<< HEAD

                }
            }


=======
                }
            }

>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
            #Validar la cantidad
            if (strlen($temp_cantidad) == 0) {
                $err_cantidad = "La cantidad es obligatoria";
            } else {
                if ($temp_cantidad > 99999.99) {
                    $err_cantidad = "La cantidad no debe ser mayor a 99999,99";
                } else if ($temp_cantidad < 0) {
                    $err_cantidad = "La cantidad no puede ser menor a 0";
                } else {
                    $cantidad = $temp_cantidad;
                }
            }
        }
<<<<<<< HEAD
        

        ?>
        <div class="col-9">
            <legend>Inserta Producto</legend>
=======

        ?>
        <div class="col-9">
            <h2>Inserta Producto</h2>
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
            <form action="" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre Producto</label>
                    <input class="form-control" type="text" name="nombre">
                    <?php if (isset($err_nombre))
                        echo $err_nombre ?>
<<<<<<< HEAD
                </div>
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input class="form-control" type="text" name="precio">
                    <?php if (isset($err_precio))
                        echo $err_precio ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <input class="form-control" type="text" name="descripcion">
                    <?php if (isset($err_descripcion))
                        echo $err_descripcion ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input class="form-control" type="text" name="cantidad">
                    <?php if (isset($err_cantidad))
                        echo $err_cantidad ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>
                <input type="submit" value="Registrar">
            </form>
            <?php
            if(isset($nombre) && isset($precio) && isset($descripcion) && isset($cantidad)){
                echo "<h3>Nombre: $nombre</h3>";
                echo "<h3>Precio: $precio</h3>";
                echo "<h3>Descripción: $descripcion</h3>";
                echo "<h3>Cantidad: $cantidad</h3>";
                echo "<h2>Completado</h2>";
                
                $sql = "INSERT INTO productos (nombreProducto, precio, descripcion,
                                                cantidad, imagen)
                        VALUES('$nombre','$precio','$descripcion','$cantidad','$ruta_final')";
                
                $conexion -> query($sql);
            }
            ?>
        </div>
    </div>

</body>

</html>
=======
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="text" name="precio">
                    <?php if (isset($err_precio))
                        echo $err_precio ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input class="form-control" type="text" name="descripcion">
                    <?php if (isset($err_descripcion))
                        echo $err_descripcion ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cantidad</label>
                        <input class="form-control" type="text" name="cantidad">
                    <?php if (isset($err_cantidad))
                        echo $err_cantidad ?>
                    </div>
                    <input type="submit" value="Registrar">
                </form>
            </div>
        </div>
    </body>

    </html>
>>>>>>> 6335d655867b95f2ec0c06fbe0d6eebb3033f116
