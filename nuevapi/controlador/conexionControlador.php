<?php
// Definición de la clase 'conexionControlador' que maneja la conexión a la base de datos.
class conexionControlador
{
    // Constructor de la clase, que en este caso no realiza ninguna acción.
    function __construct()
    {

    }

    // Método público 'conectarBd' que establece la conexión con la base de datos.
    public function conectarBd()
    {
        // Se incluye el archivo 'conexionModelo.php', que probablemente contiene la clase para la conexión a la base de datos.
        include_once "modelo/conexionModelo.php";
        
        // Se crea una nueva instancia de la clase 'conexionModelo' que maneja la conexión a la base de datos.
        $conexion = new conexionModelo;
        
        // Se llama al método 'conectar' de la clase 'conexionModelo', que realiza la conexión a la base de datos.
        // Este método debe devolver el objeto de conexión a la base de datos.
        return $conexion->conectar();
    }
}
