<?php
// Definición de la clase 'conexionModelo', que gestiona la conexión a la base de datos.
class conexionModelo
{
    // Declaración de las propiedades privadas que almacenarán la configuración de la base de datos.
    private $host;
    private $user;
    private $pass;
    private $db;

    // Constructor de la clase que inicializa los parámetros de conexión.
    public function __construct()
    {
        // Definición de las constantes de la base de datos. 
        // Estas constantes contienen el nombre de la base de datos, el usuario y la contraseña.
        define('DB', 'api');
        define('USER', 'root');
        define('PASSWORD', '');

        // Asignación de los valores a las propiedades de la clase usando las constantes definidas.
        $this->host = 'localhost';
        $this->user = constant('USER');
        $this->pass = constant('PASSWORD');
        $this->db = constant('DB');
    }

    // Método público 'conectar' que establece la conexión con la base de datos.
    function conectar()
    {
        // Intento de conexión a la base de datos utilizando el servidor, el usuario, la contraseña y el nombre de la base de datos.
        // Si la conexión falla, se generará un error.
        // 'mysqli_errno($conn)' captura el código de error de la conexión para mostrarlo.
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db) or die("Error" . mysqli_errno($conn));
        
        // Configura la conexión para que use el conjunto de caracteres UTF-8, asegurando una correcta codificación de caracteres.
        $conn->set_charset("utf8");

        // Retorna el objeto de conexión, que se puede usar para realizar consultas a la base de datos.
        return $conn;
    }
}
?>
