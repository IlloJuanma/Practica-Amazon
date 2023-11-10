<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Cinzel&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/principal.css">
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
    ?>

    <header>
        <div class="container pagina_principal">
            <h1>Página principal</h1>
            <h2>Bienvenido <?php echo $usuario ?></h2>
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
                        </svg> Tienda Online <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-torii" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            <li class="nav-item">
                                <a class="nav-link" href="#proyectos">Productos</a>
                            </li>
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
                                    <a href="cerrar_sesion.php">Cerrar sesión</a>
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
        <div class="container">
            <div class="col-6">
                <h1>Productos</h1>
                <table class="table table-striped table-hover">
                    <thead class="table table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($productos as $producto) {
                            echo "<tr>";
                            //Accedemos como en java "pelicula.titulo
                            echo "<td>" . $producto->idProducto . "</td>";
                            echo "<td>" . $producto->nombreProducto . "</td>";
                            echo "<td>" . $producto->precio . "</td>";
                            echo "<td>" . $producto->descripcion . "</td>";
                            echo "<td>" . $producto->cantidad . "</td>";
                            echo "<td>";
                        ?>
                            <img width="180" height="150" src="<?php echo $producto->imagen ?>">
                        <?php
                            echo "</td>";
                            echo "</tr>";
                        };

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>