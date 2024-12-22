<?php
// Obtiene el valor de la cédula enviada mediante el método POST desde el frontend.
$cedula = $_POST['cedula'];

// Crea una nueva instancia de la clase 'consultar' pasando el valor de la cédula como parámetro.
$consultar = new consultar($cedula);

// Llama al método 'consultar' de la clase 'consultar' para realizar la consulta.
$consultar->consultar();

// Definición de la clase 'consultar'.
class consultar {
    // Define una propiedad pública '$cedula' para almacenar el número de cédula.
    public $cedula;
    
    // Constructor de la clase. Se ejecuta cuando se crea una nueva instancia de la clase.
    // Recibe el número de cédula como argumento y lo asigna a la propiedad '$cedula'.
    function __construct($cedula) {
        $this->cedula = $cedula; // Asigna la cédula al objeto actual.
    }
    
    // Método 'consultar' que realiza la consulta a la API.
    function consultar() {
        // Construye la URL para la solicitud GET, agregando el número de cédula como parámetro de consulta.
        $url = "http://localhost/nuevapi?consultar=" . $this->cedula;
        
        // Inicializa una sesión de cURL con la URL construida.
        $ch = curl_init($url);
        
        // Configura cURL para que devuelva la respuesta como una cadena en lugar de imprimirla directamente.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Permite que cURL siga cualquier redirección si la URL cambia.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Seguir redirecciones
        
        // Ejecuta la solicitud cURL y guarda la respuesta en la variable '$response'.
        $response = curl_exec($ch);
        
        // Cierra la sesión de cURL después de recibir la respuesta.
        curl_close($ch);
        
        // Imprime la respuesta de la API en la página.
        echo "Respuesta: " . $response;
    }
}
?>
