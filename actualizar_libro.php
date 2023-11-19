<?php include ('../config/autorizacion.php')?>
<?php
include('../config/conexion.php');

if (isset($_POST['id_libro']) && is_numeric($_POST['id_libro'])) {

    $id_libro = $_POST['id_libro'];

    $sql = "SELECT * FROM TBL_LIBRO WHERE col_id_libro = :id_libro";  
     //$result = $conn->query($sql);
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id_libro', $id_libro, PDO::PARAM_INT);
    $stmt->execute();
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        // Obtener los datos del libro
        //$row = $result->fetch_assoc();
        
        $titulo_libro = $row["col_titulo_libro"];
        $resumen = $row["col_resumen"];
        $genero = $row["col_genero_literario"];
        $numero_paginas = $row["col_numero_paginas"];
        $editorial = $row["col_editorial"];
        $fecha_publicacion = $row["col_fecha_publicacion"];
        $ubicacion = $row["col_ubicacion_fisica"];
        $url = $row["col_url"];
        $estado = $row["col_estado"];
        $cantidad = $row["col_cantidad"];
        $autor = $row["col_id_autor"];
    } else {
        echo "No se encontró un libro con el ID proporcionado.";
        exit();
    }
} else {
    echo "ID de libro no válido.";
    exit();
}
?>



<!DOCTYPE html>
<html>



    <head>
        <title>Editar Libro</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>



    <body>
        <div class="container">
<?php include('../templates/menu_libros.php'); ?>



            <form method="POST" action="procesar_actualizar_libro.php">
                <input type="hidden" name="id_libro" value="<?php echo $id_libro; ?>">


        
                <div class="form-group">
                    <label for="titulo_libro" class="form-label">Nombre del Libro:</label>
                    <input type="text" class="form-control" id="titulo_libro" name="titulo_libro" value="<?php echo $titulo_libro; ?>">
                </div>

                
                <div class="form-group">
                    <label for="resumen" class="form-label">Resumen:</label>
                    <input type="text" class="form-control" id="resumen" name="resumen" value="<?php echo $resumen; ?>">
                </div>    

                <div class="form-group">
                    <label for="genero" class="form-label">Género Literario:</label>
                    <input type="text" class="form-control" id="genero" name="genero" value="<?php echo $genero; ?>">
                </div> 

                <div class="form-group">
                    <label for="numero_paginas" class="form-label">Número de Páginas:</label>
                    <input type="number" class="form-control" id="Número_Páginas" name="numero_paginas" value="<?php echo $numero_paginas; ?>">
                </div>

                 <div class="form-group">
                    <label for="editorial" class="form-label">Editorial:</label>
                    <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo $editorial; ?>">
                </div>            
                
                <div class="form-group">
                    <label for="fecha_publicacion" class="form-label">Fecha de Publicación:</label>
                    <input type="date" class="form-control" id="fecha_publicacion" name="fecha_publicacion" value="<?php echo $fecha_publicacion; ?>">
                </div>

                 <div class="form-group">
                    <label for="ubicacion" class="form-label">Ubicación Física:</label>
                    <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $ubicacion; ?>">
                </div>
                
                <div class="form-group">
                    <label for="url" class="form-label">URL:</label>
                    <input type="text" class="form-control" id="url" name="url" value="<?php echo $url; ?>">
                </div>
                
                 <div class="form-group">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $estado; ?>">
                </div>
                
                 <div class="form-group">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="<?php echo $cantidad; ?>">
                </div>
                
                 <div class="form-group">
                    <label for="autor" class="form-label">Id_Autor:</label>
                    <input type="number" class="form-control" id="autor" name="autor" value="<?php echo $autor; ?>">
                </div>



                <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
            </form>
        </div>
    </body>



</html>
