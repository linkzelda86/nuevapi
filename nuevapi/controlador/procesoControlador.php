<?php
// Definición de la clase 'procesoControlador' que maneja las operaciones relacionadas con los procesos.
class procesoControlador {
    // Constructor de la clase, que en este caso no realiza ninguna acción.
    function __construct() {}

    // Método para consultar todos los datos a través de la API.
    // Llama al modelo 'procesoModelo' para realizar la consulta.
    function consultaApi() {
        // Se incluye el archivo del modelo 'procesoModelo.php', que contiene la lógica de la consulta.
        require_once "modelo\procesoModelo.php";
        
        // Se crea una instancia de la clase 'procesoModelo'.
        $procesoModelo = new procesoModelo;
        
        // Se llama al método 'consulta' del modelo y se devuelve el resultado.
        return $procesoModelo->consulta();
    }

    // Método para consultar los datos de un proceso basado en la cédula.
    // Recibe como parámetro la cédula y la pasa al modelo para obtener los datos correspondientes.
    function consultaPorCedula($cedula) {
        // Se incluye el archivo del modelo 'procesoModelo.php'.
        require_once "modelo\procesoModelo.php";
        
        // Se crea una instancia de la clase 'procesoModelo'.
        $procesoModelo = new procesoModelo;
        
        // Se llama al método 'consultaPorCedula' del modelo con la cédula proporcionada y se devuelve el resultado.
        return $procesoModelo->consultaPorCedula($cedula);
    }

    // Método para insertar nuevos datos en la base de datos.
    // Recibe como parámetro un array de datos que serán insertados.
    function insertarDatos($datos) {
        // Se incluye el archivo del modelo 'procesoModelo.php'.
        require_once "modelo\procesoModelo.php";
        
        // Se crea una instancia de la clase 'procesoModelo'.
        $procesoModelo = new procesoModelo;
        
        // Se llama al método 'insertar' del modelo con los datos recibidos y se devuelve el resultado.
        return $procesoModelo->insertar($datos);
    }

    // Método para actualizar datos existentes en la base de datos.
    // Recibe como parámetro un array de datos que serán actualizados.
    function actualizarDatos($datos) {
        // Se incluye el archivo del modelo 'procesoModelo.php'.
        require_once "modelo\procesoModelo.php";
        
        // Se crea una instancia de la clase 'procesoModelo'.
        $procesoModelo = new procesoModelo;
        
        // Se llama al método 'actualizar' del modelo con los datos recibidos y se devuelve el resultado.
        return $procesoModelo->actualizar($datos);
    }

    // Método para eliminar datos basados en la cédula.
    // Recibe como parámetro la cédula del registro a eliminar.
    function eliminarDatos($cedula) {
        // Se incluye el archivo del modelo 'procesoModelo.php'.
        require_once "modelo\procesoModelo.php";
        
        // Se crea una instancia de la clase 'procesoModelo'.
        $procesoModelo = new procesoModelo;
        
        // Se llama al método 'eliminar' del modelo con la cédula recibida y se devuelve el resultado.
        return $procesoModelo->eliminar($cedula);
    }
}
?>
