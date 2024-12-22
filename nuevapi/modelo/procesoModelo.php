<?php
// Definición de la clase 'procesoModelo', que gestiona las operaciones sobre los datos en la base de datos.
class procesoModelo {
    // Constructor de la clase, que no realiza ninguna acción en este caso.
    function __construct() {}

    // Método para realizar una consulta de todos los datos de las tablas 'datos' y 'curso'.
    function consulta() {
        // Se incluye el archivo del controlador de conexión para establecer la conexión con la base de datos.
        require_once "controlador/conexionControlador.php";
        $conexion = new conexionControlador;
        
        // Se obtiene la conexión a la base de datos.
        $conn = $conexion->conectarBd();
        
        // Consulta SQL para obtener todos los registros de las tablas 'datos' y 'curso' con un INNER JOIN.
        $consulta = "SELECT * FROM datos INNER JOIN curso ON datos.cedula = curso.cedula";
        
        // Se ejecuta la consulta.
        $resultado = $conn->query($consulta);
        
        // Se inicializa un arreglo vacío para almacenar los resultados.
        $datos = [];
        
        // Se recorre cada fila de resultados y se agrega al arreglo 'datos'.
        while ($fila = mysqli_fetch_array($resultado)) {
            $datos[] = $fila;
        }
        
        // Se retorna el arreglo con los datos obtenidos.
        return $datos;
    }

    // Método para consultar los datos de un proceso basado en la cédula.
    function consultaPorCedula($cedula) {
        // Se incluye el archivo del controlador de conexión.
        require_once "controlador/conexionControlador.php";
        $conexion = new conexionControlador;
        
        // Se obtiene la conexión a la base de datos.
        $conn = $conexion->conectarBd();
        
        // Se prepara la consulta SQL utilizando una declaración preparada con parámetros.
        $stmt = $conn->prepare("SELECT * FROM datos INNER JOIN curso ON datos.cedula = curso.cedula WHERE datos.cedula = ?");
        
        // Se vincula el parámetro (la cédula) a la consulta.
        $stmt->bind_param("s", $cedula);
        
        // Se ejecuta la consulta.
        $stmt->execute();
        
        // Se obtiene el resultado de la ejecución.
        $resultado = $stmt->get_result();
        
        // Se inicializa un arreglo vacío para almacenar los resultados.
        $datos = [];
        
        // Se recorre cada fila de resultados y se agrega al arreglo 'datos'.
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        
        // Se retorna el arreglo con los datos obtenidos.
        return $datos;
    }

    // Método para insertar nuevos datos en las tablas 'datos' y 'curso'.
    function insertar($datos) {
        // Se incluye el archivo del controlador de conexión.
        require_once "controlador/conexionControlador.php";
        $conexion = new conexionControlador;
        
        // Se obtiene la conexión a la base de datos.
        $conn = $conexion->conectarBd();

        // Se prepara la consulta SQL para insertar en la tabla 'datos'.
        $stmt = $conn->prepare("INSERT INTO datos (cedula, nombre, apellido) VALUES (?, ?, ?)");
        
        // Se vinculan los parámetros a la consulta (cedula, nombre, apellido).
        $stmt->bind_param("sss", $datos['cedula'], $datos['nombre'], $datos['apellido']);
        
        // Se ejecuta la consulta para insertar los datos en 'datos'.
        $stmt->execute();

        // Se prepara la consulta SQL para insertar en la tabla 'curso'.
        $stmt = $conn->prepare("INSERT INTO curso (cedula, nombrep, paralelo) VALUES (?, ?, ?)");
        
        // Se vinculan los parámetros a la consulta (cedula, nombrep, paralelo).
        $stmt->bind_param("sss", $datos['cedula'], $datos['nombrep'], $datos['paralelo']);
        
        // Se ejecuta la consulta para insertar los datos en 'curso'.
        $stmt->execute();

        // Se retorna un mensaje indicando que los datos se insertaron correctamente.
        return ["mensaje" => "Datos insertados correctamente"];
    }

    // Método para actualizar los datos en las tablas 'datos' y 'curso'.
    function actualizar($datos) {
        // Se incluye el archivo del controlador de conexión.
        require_once "controlador/conexionControlador.php";
        $conexion = new conexionControlador;
        
        // Se obtiene la conexión a la base de datos.
        $conn = $conexion->conectarBd();

        // Se prepara la consulta SQL para actualizar los datos en la tabla 'datos'.
        $stmt = $conn->prepare("UPDATE datos SET nombre = ?, apellido = ? WHERE cedula = ?");
        
        // Se vinculan los parámetros a la consulta (nombre, apellido, cedula).
        $stmt->bind_param("sss", $datos['nombre'], $datos['apellido'], $datos['cedula']);
        
        // Se ejecuta la consulta para actualizar los datos en 'datos'.
        $stmt->execute();

        // Se prepara la consulta SQL para actualizar los datos en la tabla 'curso'.
        $stmt = $conn->prepare("UPDATE curso SET nombrep = ?, paralelo = ? WHERE cedula = ?");
        
        // Se vinculan los parámetros a la consulta (nombrep, paralelo, cedula).
        $stmt->bind_param("sss", $datos['nombrep'], $datos['paralelo'], $datos['cedula']);
        
        // Se ejecuta la consulta para actualizar los datos en 'curso'.
        $stmt->execute();

        // Se retorna un mensaje indicando que los datos se actualizaron correctamente.
        return ["mensaje" => "Datos actualizados correctamente"];
    }

    // Método para eliminar los datos en las tablas 'datos' y 'curso' basados en la cédula.
    function eliminar($cedula) {
        // Se incluye el archivo del controlador de conexión.
        require_once "controlador/conexionControlador.php";
        $conexion = new conexionControlador;
        
        // Se obtiene la conexión a la base de datos.
        $conn = $conexion->conectarBd();

        // Se prepara la consulta SQL para eliminar los datos en la tabla 'datos'.
        $stmt = $conn->prepare("DELETE FROM datos WHERE cedula = ?");
        
        // Se vincula el parámetro (cedula) a la consulta.
        $stmt->bind_param("s", $cedula);
        
        // Se ejecuta la consulta para eliminar los datos en 'datos'.
        $stmt->execute();

        // Se prepara la consulta SQL para eliminar los datos en la tabla 'curso'.
        $stmt = $conn->prepare("DELETE FROM curso WHERE cedula = ?");
        
        // Se vincula el parámetro (cedula) a la consulta.
        $stmt->bind_param("s", $cedula);
        
        // Se ejecuta la consulta para eliminar los datos en 'curso'.
        $stmt->execute();

        // Se retorna un mensaje indicando que los datos se eliminaron correctamente.
        return ["mensaje" => "Datos eliminados correctamente"];
    }
}
?>
