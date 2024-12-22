<html>

<head>
    <!-- Título de la página que se muestra en la pestaña del navegador -->
    <title>App consumo de API - Luis Reinoso</title>
    
    <!-- Inclusión del archivo CSS de Bootstrap para darle estilo a la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
    <!-- Inclusión de jQuery para manipulación del DOM y para hacer peticiones AJAX -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <!-- Inclusión de un archivo de funciones personalizadas (funciones.js) -->
    <script  src="lib/funciones.js"></script>
</head>

<body>
    <!-- Contenedor principal para todo el contenido de la página -->
    <div class="container py-3">
        <!-- Encabezado de la página -->
        <header>
            <h1 align="center">Operaciones API - Luis Reinoso</h1><br>
        </header>

        <main>
            <!-- Filas y columnas para organizar los formularios en tarjetas (cards) -->
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
                
                <!-- Tarjeta de consulta -->
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Consulta</h4>
                        </div>
                        <div class="card-body">
                            <!-- Campo para ingresar número de cédula para consulta -->
                            <span>Número de cédula:</span>
                            <input id="consultaCedula" type="text" class="form-control"><br>
                            
                            <!-- Botón que ejecuta la función 'consultar()' para realizar la consulta -->
                            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="consultar();">Consultar</button>
                            <!-- Área donde se mostrarán los resultados de la consulta -->
                            <div id="resultado1"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta de ingreso de datos -->
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Ingreso</h4>
                        </div>
                        <div class="card-body">
                            <!-- Campos para ingresar la información del estudiante -->
                            <span>Número de cédula:</span>
                            <input id="ingresoCedula" type="text" class="form-control"><br>
                            
                            <span>Nombres:</span>
                            <input id="ingresoNombres" type="text" class="form-control"><br>
                            
                            <span>Apellidos:</span>
                            <input id="ingresoApellidos" type="text" class="form-control"><br>
                            
                            <span>Curso:</span>
                            <input id="ingresoCurso" type="text" class="form-control"><br>
                            
                            <span>Paralelo</span>
                            <input id="ingresoParalelo" type="text" class="form-control"><br>
                            
                            <!-- Botón para insertar los datos -->
                            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="insertar()">Insertar</button>
                            <!-- Área donde se mostrarán los resultados de la inserción -->
                            <div id="resultado2"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta para modificar los datos existentes -->
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Modificación</h4>
                        </div>
                        <div class="card-body">
                            <!-- Campos para modificar la información del estudiante -->
                            <span>Número de cédula:</span>
                            <input id="actualizarCedula" type="text" class="form-control"><br>
                            
                            <span>Nombres:</span>
                            <input id="actualizarNombres" type="text" class="form-control"><br>
                            
                            <span>Apellidos:</span>
                            <input id="actualizarApellidos" type="text" class="form-control"><br>
                            
                            <span>Curso:</span>
                            <input id="actualizarCurso" type="text" class="form-control"><br>
                            
                            <span>Paralelo</span>
                            <input id="actualizarParalelo" type="text" class="form-control"><br>
                            
                            <!-- Botón para actualizar los datos -->
                            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="actualizar()">Actualizar</button>
                            <!-- Área donde se mostrarán los resultados de la actualización -->
                            <div id="resultado3"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tarjeta para eliminar los datos -->
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                        <div class="card-header py-3 text-white bg-primary border-primary">
                            <h4 class="my-0 fw-normal">Eliminación</h4>
                        </div>
                        <div class="card-body">
                            <!-- Campo para ingresar número de cédula para eliminar los datos -->
                            <span>Número de cédula:</span>
                            <input id="eliminarCedula" type="text" class="form-control"><br>
                            
                            <!-- Botón para eliminar los datos -->
                            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="eliminar()">Eliminar</button>
                            <!-- Área donde se mostrarán los resultados de la eliminación -->
                            <div id="resultado4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
<footer>
</footer>
</html>
