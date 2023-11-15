<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satoru no noroi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Cinzel&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/principal.css">
    <link rel="stylesheet" href="css/productos.css">
    <?php require 'objetos/producto.php' ?>
    <?php require 'funciones/base_datos_tienda.php' ?>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
    } else {
        header("Location: login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["usuario"])) {
        $idProducto = $_POST["id_Producto"];
        $usuario = $_SESSION["usuario"];

        //Aqui puedo realizar validaciones si quiero

        // Obtengo el idCestas y la cantidad del usuario actual
        $sqlCesta = "SELECT idCesta FROM cestas WHERE usuario = '$usuario'";
        $resultadoCestas = $conexion->query($sqlCesta);

        if ($resultadoCestas->num_rows > 0) {
            $filaCestas = $resultadoCestas->fetch_assoc();
            $idCesta = $filaCestas["idCesta"];
        }

        // Verifico si el producto ya está en la cesta
        $sqlProductoExistente = "SELECT idProducto, cantidad FROM productosCestas WHERE idCesta = '$idCesta' AND idProducto = '$idProducto'";
        $resultadoProductoExistente = $conexion->query($sqlProductoExistente);

        if ($resultadoProductoExistente->num_rows > 0) {
            // Si el producto ya está en la cesta, incremento la cantidad
            $filaProductoExistente = $resultadoProductoExistente->fetch_assoc();
            $cantidadExistente = $filaProductoExistente["cantidad"];
            $nuevaCantidad = $cantidadExistente + 1;

            // Actualizo la cantidad
            $sqlActualizarCantidad = "UPDATE productosCestas SET cantidad = '$nuevaCantidad' WHERE idCesta = '$idCesta' AND idProducto = '$idProducto'";
            $conexion->query($sqlActualizarCantidad);
        } else {
            // Si el producto no está en la cesta, inserto un nuevo registro
            $sqlInsert = "INSERT INTO productosCestas (idCesta, idProducto, cantidad) VALUES ('$idCesta', '$idProducto', '1')";
            $conexion->query($sqlInsert);
        }

        $mensajeExito = "Producto añadido a la cesta!!";
    } else {
        $mensajeError = "Producto no añadido a la cesta, Error!";
    }


    ?>

    <header>
        <div class="container pagina_principal">
            <h1>Bienvenido
                <?php echo $usuario ?>
                -sama
            </h1>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand titulo_nav" href="#"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-torii" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4c5.333 1.333 10.667 1.333 16 0" />
                            <path d="M4 8h16" />
                            <path d="M12 5v3" />
                            <path d="M18 4.5v15.5" />
                            <path d="M6 4.5v15.5" />
                        </svg> Satoru no noroi <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-torii" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 4c5.333 1.333 10.667 1.333 16 0" />
                            <path d="M4 8h16" />
                            <path d="M12 5v3" />
                            <path d="M18 4.5v15.5" />
                            <path d="M6 4.5v15.5" />
                        </svg></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse texto_nav" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>

                            <?php
                            if ($_SESSION["rol"] == "admin") { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="productos.php">Productos</a>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Categoria
                                </a>
                                <ul class="dropdown-menu bg-dark-subtle">
                                    <li><a class="dropdown-item" href="https://www.instagram.com/juanma_rodrguez/"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                                <path d="M16.5 7.5l0 .01" />
                                            </svg> Tecnologico</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="https://twitter.com/MrFlexaverde"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-x" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                                <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                            </svg> Del Hogar</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="https://github.com/IlloJuanma"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-github" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                            </svg> Ropa</a>
                                    </li>
                                </ul>
                            <li class="nav-item">
                                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesión</a>
                            </li>
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
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <aside class="col-md-2">
                    <div class="anuncio-vertical">
                        <img class="foto_aside" src="https://picsum.photos/500/1080?=random=1" alt="Anuncio">
                        <p>Subete no subarashī monogatari wa sōshoku sa reru niataisuru</p>
                        <a href="#" class="btn btn-primary">Ver</a>
                    </div>
                </aside>

                <?php
                $sql = "SELECT * FROM productos";
                $resultado = $conexion->query($sql);
                $productos = [];

                while ($fila = $resultado->fetch_assoc()) {
                    $nuevo_producto = new Producto(
                        $fila["idProducto"],
                        $fila["nombreProducto"],
                        $fila["precio"],
                        $fila["descripcion"],
                        $fila["cantidad"],
                        $fila["imagen"]
                    );
                    array_push($productos, $nuevo_producto);
                }
                ?>
                <div class="col-md-8">
                    <div class="col-12">
                        <h1 class="mt-5 mb-4">Productos</h1>
                        <div class="table-responsive">
                            <table class="table table-hover table-primary">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Descripcion</th>
                                        <th>Cantidad</th>
                                        <th>Imagen</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php foreach ($productos as $producto) { ?>
                                        <tr>
                                            <td class="align-middle text-center">
                                                <?php echo $producto->idProducto ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php echo $producto->nombreProducto ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php echo $producto->precio ?>€
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php echo $producto->descripcion ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <?php echo $producto->cantidad ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <img class="img-thumbnail img-fluid w-50 mx-auto d-block" src="<?php echo $producto->imagen ?>" alt="Imagen del producto">
                                            </td>
                                            <td class="align-middle text-center">
                                                <form action="" method="POST">
                                                    <input type="hidden" value="<?php echo $producto->idProducto ?>" name="id_Producto">
                                                    <input class="btn btn-primary" type="submit" value="Añadir">
                                                </form>
                                            </td>
                                           
                                            <?php
                                            if ($_SESSION["rol"] == "admin") { ?>
                                            <td class="align-middle text-center">
                                                <form action="" method="POST">
                                                    <input type="hidden" value="<?php echo $producto->idProducto ?>" name="id_Producto">
                                                    <input class="btn btn-primary" type="submit" value="Eliminar">
                                                </form>
                                            </td>                           
                                            <?php } ?>

                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <aside class="col-md-2">
                    <div class="anuncio-vertical">
                        <img class="foto_aside" src="https://picsum.photos/500/1080?=random=2" alt="Anuncio">
                        <p>Satoshi no ryōiki de tenkai sa reru no wa nigeba no nai basho </p>
                        <a href="#" class="btn btn-primary">Ver</a>
                    </div>
                </aside>

            </div>

            <?php if (isset($mensajeExito)) {
                echo '<div class="text-center mensaje-exito display-3">' . $mensajeExito . '</div>';
            } ?>

    </section>
    <!-- Footer -->
    <footer class="text-center py-3 miFooter">
        &copy; Juanma Rodríguez Moreno - <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-alipay" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M19 3h-14a2 2 0 0 0 -2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2 -2v-14a2 2 0 0 0 -2 -2z" />
            <path d="M7 7h10" />
            <path d="M12 3v7" />
            <path d="M21 17.314c-2.971 -1.923 -15 -8.779 -15 -1.864c0 1.716 1.52 2.55 2.985 2.55c3.512 0 6.814 -5.425 6.814 -8h-6.604" />
        </svg> Todos los derechos reservados 2023
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>