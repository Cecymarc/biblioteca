<?php include ('../config/autorizacion.php')?>
<html>
    <head>
        <title>Bienvenidos a mi Sitio Web</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">                   

            <?php
            include('../templates/menu_libros.php'); // Incluye el menú de navegación
            
            if (isset($_GET['operacion']) && isset($_GET['idlibro'])) {
 
                $operacion = $_GET['operacion'];
                $idlibro = $_GET['idlibro'];
                echo('<div class="alert alert-warning alert-dismissible fade show" role="alert">');
                echo('Operacion: <strong>'. $operacion . '</strong>: Se ha realizado el proceso con éxito para el libro: '. $idlibro . '');
                echo('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
                echo('</div>');
            }    
            ?>
                    

            <table class="table table-striped">

                <thead>
                    <tr>
                        <th>Id Libro</th>
                        <th>Titulo</th>
                        <th>Resumen</th>
                        <th>Genero</th>
                        <th>Nro Páginas</th>
                        <th>Editorial</th>
                        <th>Fecha Publicación</th>
                        <th>Ubicación Fisica</th>
                        <th>URL</th>
                         <th>Estado</th>
                          <th>Cantidad</th>
                           <th>Autor</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    include('../config/conexion.php');

                    // Inicializa las variables como una cadena vacía por defecto
                    $id_libro = "";
                    $titulo_libro = "";
                    $autor = "";

                    //Realizamos una consulta a la base de datos, tabla cliente
                    $sql = "SELECT * FROM tbl_libro AS l
                            INNER JOIN tbl_autor AS a ON a.col_id_autor = l.col_id_autor";
                            
                                      
                   // Verifica si se ha enviado una variable POST
                    if (isset($_POST['id_libro']) && !empty($_POST['id_libro'])) {
                        // Recuperar el nombre del libro ingresado en el formulario
                        $id_libro = $_POST['id_libro'];
                        $sql .= " WHERE l.col_id_libro = :id_libro";
                    }
                    
                    
                    // Verifica si se ha enviado una variable POST
                    if (isset($_POST['titulo_libro']) && !empty($_POST['titulo_libro'])) {
                        // Recuperar el nombre del libro ingresado en el formulario
                        $titulo_libro = "%" . $_POST['titulo_libro'] ."%";
                        $sql .= " AND l.col_titulo_libro LIKE :titulo_libro";
                       
                    }

                    // Verifica si se ha enviado una variable POST
                    if (isset($_POST['autor']) && !empty($_POST['autor'])) {
                        // Recuperar el nombre del autor ingresado en el formulario
                        $autor = "%" . $_POST['autor'] ."%";
                        $sql .= " AND a.col_primer_nombre_autor LIKE :autor";                       
                       
                    }
                    
                    $sql.= " ORDER BY l.col_id_libro ASC;";

                                        
                    try {
                    // Preparar la consulta
                    $stmt = $conn->prepare($sql);
                    
                    if(!empty($id_libro)) {
                        $stmt->bindParam(':id_libro',$id_libro, PDO::PARAM_STR);
                    }
                    
                    if(!empty($titulo_libro)) {
                        $stmt->bindParam(':titulo_libro',$titulo_libro, PDO::PARAM_STR);
                    }
                    
                    if(!empty($autor)) {
                        $stmt->bindParam(':autor',$autor, PDO::PARAM_STR);
                    }
                    
                                       
                    //Ejecutamos la consulta
                    $stmt->execute();
                    
                    //obtenemos el resultado
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                          
                        if (!empty($result)) {
                            
                            // Recorremos cada uno de los registros devueltos por la base de datos:
                            //while ($row = $result->fetch_assoc()) {
                            foreach ($result as $row) {
                                echo('<tr>');
                                echo("<td>" . $row["col_id_libro"] . "</td>");
                                echo("<td>" . $row["col_titulo_libro"] . "</td>");
                                echo("<td>" . $row["col_resumen"] . "</td>");
                                echo("<td>" . $row["col_genero_literario"] . "</td>");
                                echo("<td>" . $row["col_numero_paginas"] . "</td>");
                                echo("<td>" . $row["col_editorial"] . "</td>");
                                echo("<td>" . $row["col_fecha_publicacion"] . "</td>");
                                echo("<td>" . $row["col_ubicacion_fisica"] . "</td>");
                                echo("<td> <a href=" . $row["col_url"] .  " target='_blank' title= 'Abrir link'> Abrir enlace </a> </td>");
                                echo("<td>" . $row["col_estado"] . "</td>");
                                echo("<td>" . $row["col_cantidad"] . "</td>");
                                echo("<td>" . $row["col_primer_nombre_autor"] . " " . $row["col_primer_apellido_autor"] . " " . $row["col_segundo_apellido_autor"] . "</td>");
                                                                
                                
                                // Agregamos un botón para editar
                                echo('<td>');
                                echo('<form method="POST" action="actualizar_libro.php">');
                                echo('<input type="hidden" name="id_libro" value="' . $row["col_id_libro"] . '">');
                                echo('<button type="submit" class="btn btn-warning">Editar</button>');
                                echo('</form>');
                                echo('</td>');
                                // Agregamos un botón para eliminar
                                echo('<td colspan="9">');
                                echo('<form method="POST" action="procesar_eliminar_libro.php">');
                                echo('<input type="hidden" name="id_libro" value="' . $row["col_id_libro"] . '">');
                                echo('<button type="submit" class="btn btn-danger" onclick="return confirm(\'¿Esta seguro de eliminar el Libro?\')">Eliminar</button>');
                                echo('</form>');
                                echo('</td>');
                                echo("</tr>");
                            }
                        } else {
                            echo "No se encontraron registros en la base de datos, tabla TBL_LIBROS";
                        }
                        
                        //cerrar la conexion para evitar multiples sesiones activas
                      $conn = null;   
                      
                    } catch(PDOException $e){
                        
                        echo "Error en la consulta de las base de datos: " . $e->getMessage();
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </body>
</html>
