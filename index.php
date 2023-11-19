<?php include ('config/autorizacion.php')?>

<html>
     
    <head>
        <title>       
            Bienvenidos a mis sitio Web
        </title>      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <style> 
            .module {
                border: 1px solid #ddd;
                padding:20px;
                margin: 10px;
                text-align: center;
            }
        </style>
     </head>
     
     
    <body> 
    
        <div class="container text-center mt-5">
            
            <h1>Bienvenido a la Biblioteca</h1>
            <p> ¡Gracias por visitar nuestro sitio web!</p>
            
        
            <div class="row">
                
                <div class="col-md-6">
                    <div class="module">
                        <h2> Módulo de Usuarios</h2>
                        <p> Administracion de informacion de Usuarios</p>
                        <a class="btn btn-primary" href="mod_usuarios/modulo_usuarios.php"> Ir al Módulo de Usuarios</a>
                    </div>
                </div>  
                                
                <div class="col-md-6">
                    <div class="module">
                        <h2>Módulo de Prestamos</h2>
                        <p>Administracion de informacion de Prestamos</p>
                        <a class="btn btn-primary" href="#"> Ir al Módulo de Préstamos</a>
                    </div>
                </div> 
                 <div class="col-md-6">
                    <div class="module">
                        <h2>Módulo de Libros</h2>
                        <p>Administracion de informacion de Libros</p>
                        <a class="btn btn-primary" href="mod_libros/modulo_libros.php"> Ir al Módulo de Libros</a>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="module">
                        <h2>Módulo de Autores</h2>
                        <p>Administracion de informacion de Autores</p>
                        <a class="btn btn-primary" href="mod_autor/modulo_autor.php""> Ir al Módulo de Autor</a>
                    </div>
                </div>
                
            </div>    
         
        
                           
              
                   
        </div>    
        
    </body>
    

</html>
