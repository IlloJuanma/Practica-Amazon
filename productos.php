<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Cinzel&family=Satisfy&display=swap"
        rel="stylesheet">
    <?php require 'funciones/depurar.php' ?>
    <?php require 'funciones/base_datos_tienda.php' ?>
    <link rel="stylesheet" href="css/productos.css">
    <link rel="stylesheet" href="css/principal.css">
</head>

<body>
    <?php
    session_start();

    if ($_SESSION["rol"] != "admin") {
        header("Location: login.php");
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_nombre = depurar($_POST["nombre"]);
        $temp_precio = depurar($_POST["precio"]);
        $temp_descripcion = depurar($_POST["descripcion"]);
        $temp_cantidad = depurar($_POST["cantidad"]);


        # Imagen
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ruta_temporal = $_FILES["imagen"]["tmp_name"];
        $ruta_final = "img/" . $nombre_imagen;
        move_uploaded_file($ruta_temporal, $ruta_final);

        #Validación de nombre
        if (strlen($temp_nombre) == 0) {
            $err_nombre = "El nombre es obligatorio";
        } else {
            if (strlen($temp_nombre) > 40) {
                $err_nombre = "El nombre no puede tener más de 
                    40 caracteres";
            } else {
                $patron = "/^[a-zA-Z0-9áÁéÉíÍóÓúÚñÑ ]{0,40}$/";
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
            }
        }


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
    ?>
    <header>
        <div class="container pagina_principal">
            <h1>Registrar Productos</h1>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand titulo_nav" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-torii" width="32"
                            height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4c5.333 1.333 10.667 1.333 16 0" />
                            <path d="M4 8h16" />
                            <path d="M12 5v3" />
                            <path d="M18 4.5v15.5" />
                            <path d="M6 4.5v15.5" />
                        </svg> Satoru no noroi <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-torii" width="32" height="32" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4c5.333 1.333 10.667 1.333 16 0" />
                            <path d="M4 8h16" />
                            <path d="M12 5v3" />
                            <path d="M18 4.5v15.5" />
                            <path d="M6 4.5v15.5" />
                        </svg></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse texto_nav" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="principal.php">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section class="carrousel">
        <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://picsum.photos/1920/500?=random=1" class="d-block w-100" alt="primer-foto">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1920/500?random=2" class="d-block w-100" alt="segunda-foto">
                </div>
                <div class="carousel-item">
                    <img src="https://picsum.photos/1920/500?=random3" class="d-block w-100" alt="tercera-foto">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="container my-4">
        <form action="" method="POST" enctype="multipart/form-data" class="row g-3">
            <legend>
            <img src="assets/castle.png" alt="password-icon" />
                Inserta Producto
            <img src="assets/castle.png" alt="password-icon" />
            </legend>
            <div class="mb-4 col-md-6">
                <label class="form-label">Nombre Producto</label>
                <input type="text" class="form-control" name="nombre" required>
                <?php if (isset($err_nombre))
                    echo $err_nombre ?>

                </div>
                <div class="mb-4 col-md-6">
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" required>
                <?php if (isset($err_precio))
                    echo $err_precio ?>
                </div>
                <div class="mb-4 col-md-6">
                    <label class="form-label">Descripción</label>
                    <input type="text" class="form-control" name="descripcion">
                <?php if (isset($err_descripcion))
                    echo $err_descripcion ?>
                </div>
                <div class="mb-4 col-md-6">
                    <label class="form-label">Cantidad</label>
                    <input type="text" class="form-control" name="cantidad">
                <?php if (isset($err_cantidad))
                    echo $err_cantidad ?>
                </div>
                <div class="mb-4">
                    <label class="form-label">Imagen</label>
                    <label class="custom-file-upload">
                        <input type="file" class="form-control" name="imagen">
                    </label>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Registrar producto</button>
                </div>
            </form>
        </section>

        <!-- <div class="col-md-8 offset-md-2">
            <form action="" method="POST" enctype="multipart/form-data">
                
                    <legend class="mb-4">Inserta Producto</legend>
                    <div class="mb-3">
                        <label class="form-label">Nombre Producto</label>
                        <input class="form-control" type="text" name="nombre">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Precio</label>
                            <input class="form-control" type="text" name="precio">
                        
                            <div class="mb-3">
                                <label class="form-label">Descripción</label>
                                <input class="form-control" type="text" name="descripcion">
                            
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cantidad</label>
                                <input class="form-control" type="text" name="cantidad">
                            
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Imagen</label>
                                <label class="custom-file-upload">
                                    <input class="form-control" type="file" name="imagen" id="imagen"> Selecciona archivo
                                </label>
                            </div>
                            <input class="btn btn-primary" type="submit" value="Registrar">
        
                </form> -->
        <?php
                if (isset($nombre) && isset($precio) && isset($descripcion) && isset($cantidad)) {
                    echo "<h3>Nombre: $nombre</h3>";
                    echo "<h3>Precio: $precio</h3>";
                    echo "<h3>Descripción: $descripcion</h3>";
                    echo "<h3>Cantidad: $cantidad</h3>";
                    echo "<h2>Completado</h2>";

                    $sql = "INSERT INTO productos (nombreProducto, precio, descripcion,
                                                cantidad, imagen)
                        VALUES('$nombre','$precio','$descripcion','$cantidad','$ruta_final')";

                    $conexion->query($sql);
                }
                ?>
    <!-- Footer -->
    <footer class="text-center py-3 miFooter">
        &copy; Juanma Rodríguez Moreno - <svg xmlns="http://www.w3.org/2000/svg"
            class="icon icon-tabler icon-tabler-brand-alipay" width="44" height="44" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19 3h-14a2 2 0 0 0 -2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2 -2v-14a2 2 0 0 0 -2 -2z" />
            <path d="M7 7h10" />
            <path d="M12 3v7" />
            <path
                d="M21 17.314c-2.971 -1.923 -15 -8.779 -15 -1.864c0 1.716 1.52 2.55 2.985 2.55c3.512 0 6.814 -5.425 6.814 -8h-6.604" />
        </svg> Todos los derechos reservados 2023
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>

</body>

</html>