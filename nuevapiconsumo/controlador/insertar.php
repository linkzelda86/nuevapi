<?php
// Declara un array vacío para almacenar los datos enviados desde el frontend.
$datos = [];

// Asigna a cada índice del array '$datos' el valor recibido desde la solicitud POST.
$datos['cedula'] = $_POST['cedula'];  // Cédula del estudiante
$datos['nombres'] = $_POST['nombres']; // Nombres del estudiante
$datos['apellidos'] = $_POST['apellidos']; // Apellidos del estudiante
$datos['curso'] = $_POST['curso']; // Curso al que pertenece el estudiante
$datos['paralelo'] = $_POST['paralelo']; // Paralelo del curso

// Crea una nueva instancia de la clase 'insertar' y le pasa el array '$datos' como parámetro.
$insertar = new insertar($datos);

// Llama al método 'insertar' para realizar la solicitud a la API para insertar los datos.
$insertar->insertar();

// Definición de la clase 'insertar'.
class insertar {
    // Propiedad pública '$datos' que almacenará los datos recibidos.
    public $datos;
    
    // Constructor de la clase, recibe el array '$datos' y lo asigna a la propiedad '$datos'.
    function __construct($datos) {
        $this->datos = $datos;
    }
    
    // Método que se encarga de realizar la solicitud POST a la API para insertar los datos.
    function insertar(){
        // Define la URL de la API a la que se enviarán los datos.
        $url = "http://localhost/nuevapi/?insertar";
        
        // Prepara el array '$data' que contiene los datos a enviar a la API.
        $data = [
            "cedula" => $this->datos['cedula'],       // Cédula del estudiante
            "nombre" => $this->datos['nombres'],      // Nombres del estudiante
            "apellido" => $this->datos['apellidos'],  // Apellidos del estudiante
            "nombrep" => $this->datos['curso'],       // Curso del estudiante
            "paralelo" => $this->datos['paralelo']    // Paralelo del estudiante
        ];
        
        // Inicializa una sesión cURL con la URL de la API.
        $ch = curl_init($url);
        
        // Configura cURL para que la respuesta sea devuelta como una cadena, no impresa directamente.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Permite que cURL siga las redirecciones en caso de que la URL cambie.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Seguir redirecciones
        
        // Configura la solicitud cURL como un POST.
        curl_setopt($ch, CURLOPT_POST, true);
        
        // Configura los encabezados HTTP para que el contenido sea JSON.
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        
        // Convierte el array '$data' a formato JSON y lo envía como cuerpo de la solicitud.
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
        // Ejecuta la solicitud cURL y guarda la respuesta en la variable '$response'.
        $response = curl_exec($ch);
        
        // Cierra la sesión de cURL después de recibir la respuesta.
        curl_close($ch);
        
        // Imprime la respuesta recibida de la API.
        echo "Respuesta: " . $response;
    }
}
?>
