<?php include ('../config/autorizacion.php')?>
<html>
    <head>
        <title>       
            Busqueda de Libro
        </title>      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>
    <body> 


        <div class ="container">

            <?php
            include ('../templates/menu_libros.php');//incluye el menu de navegacion
            ?>

            <form class="mt-3" method="POST" action="modulo_libros.php">

                <div class="form-group">
                    
                     <label form="id_libro" class="mt-3">ID libro:</label>                     
                    <input type="text" class="form-control mt-1" name="id_libro"
                           id="id_libro" placeholder="Ingrese el ID del libro"> 

                                                           
                    <label form="titulo_libro" class="mt-3">Nombre del Libro:</label>                     
                    <input type="text" class="form-control mt-1" name="titulo_libro"
                           id="titulo_libro" placeholder="Ingrese el nombre del libro">  
                                     

                    <label form="autor" class="mt-3">Autor:</label>                     
                    <input type="text" class="form-control mt-1" name="autor"
                           id="autor" placeholder="Ingrese el primer nombre del autor">       
                </div>

                <button type="submit" class="btn btn-primary mt-3">Buscar</button>


            </form>



        </div>
    </body>

</html>
