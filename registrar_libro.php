<?php include ('../config/autorizacion.php')?>
<html>
    <head>
        <title>Registrar Libro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">



            <?php
            include('../templates/menu_libros.php'); // Incluye el menú de navegación
            ?>

            <form class="mt-3" method="POST" action="procesar_registrar_libro.php">
                
                <div class="form-group">
                    <label for="titulo_libro" class="mt-3">Nombre del Libro:</label>
                    <input type="text" class="form-control" name="titulo_libro" id="titulo_libro" placeholder="Ingrese el nombre del Libro" required>
                </div>
                
                <div class="form-group">
                    <label for="resumen" class="mt-3">Resumen:</label>
                    <input type="text" class="form-control" name="resumen" id="resumen" placeholder="Ingrese un breve resumen del libro" required>
                </div>
                
                <div class="form-group">
                    <label for="genero" class="mt-3">Género Literario:</label>
                    <input type="text" class="form-control" name="genero" id="genero" placeholder="Ingrese el género literario del libro" required>
                </div>
                
                <div class="form-group">
                    <label for="numero_paginas" class="mt-3">Número de Páginas:</label>
                    <input type="number" class="form-control" name="numero_paginas" id="numero_paginas" placeholder="Ingrese el número de páginas del libro">
                </div>
                
                <div class="form-group">
                    <label for="editorial" class="mt-3">Editorial:</label>
                    <input type="text" class="form-control" name="editorial" id="editorial" placeholder="Ingrese la Editorial" required>
                </div>
                
                <div class="form-group">
                    <label for="fecha_publicacion" class="mt-3">Fecha de Publicación:</label>
                    <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion" placeholder="Ingrese fecha de publicación">
                </div>
                
                <div class="form-group">
                    <label for="ubicacion" class="mt-3">Ubicación Física:</label>
                    <input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ingrese la ubicación física del libro">
                </div>
                
                <div class="form-group">
                    <label for="url" class="mt-3">URL:</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Ingrese la url del libro">
                </div>
                
                <div class="form-group">
                    <label for="estado" class="mt-3">Estado:</label>
                    <input type="text" class="form-control" name="estado" id="estado" placeholder="Ingrese el estado: disponible u ocupado" required>
                </div>
                
                <div class="form-group">
                    <label for="cantidad" class="mt-3">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad de ejemplares del libro" required>
                </div>
                
                <div class="form-group">
                    <label for="autor" class="mt-3">Autor:</label>
                    <input type="number" class="form-control" name="autor" id="autor" placeholder="Ingrese el id del autor" required>
                </div>
                
                <button type="submit" class="btn btn-primary mt-3">REGISTRAR LIBRO</button>
                
            </form>
        </div>
    </body>
</html>
