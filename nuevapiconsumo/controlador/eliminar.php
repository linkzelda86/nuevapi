<?php
// Obtiene el valor de la cédula enviada mediante el método POST desde el frontend.
$cedula = $_POST['cedula'];

// Crea una nueva instancia de la clase 'elimiar' pasando el valor de la cédula como parámetro.
$elimiar = new elimiar($cedula);

// Llama al método 'eliminar' de la clase 'elimiar' para realizar la eliminación.
$elimiar->eliminar();

// Definición de la clase 'elimiar'.
class elimiar {
    // Define una propiedad pública '$cedula' para almacenar el número de cédula.
    public $cedula;
    
    // Constructor de la clase. Se ejecuta cuando se crea una nueva instancia de la clase.
    // Recibe el número de cédula como argumento y lo asigna a la propiedad '$cedula'.
    function __construct($cedula) {
        $this->cedula = $cedula; // Asigna la cédula al objeto actual.
    }
    
    // Método 'eliminar' que realiza la solicitud DELETE a la API para eliminar un registro.
    function eliminar() {
        // Construye la URL para la solicitud DELETE. No se pasa el parámetro en la URL como con el GET.
        $url = "http://localhost/nuevapi/?eliminar";
        
        // Prepara los datos a enviar como un array asociativo.
        $data = [
            "cedula" => $this->cedula
        ];
        
        // Inicializa una sesión de cURL con la URL de la API.
        $ch = curl_init($url);
        
        // Configura cURL para que devuelva la respuesta como una cadena en lugar de imprimirla directamente.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        // Permite que cURL siga cualquier redirección si la URL cambia.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Seguir redirecciones
        
        // Configura la solicitud HTTP como DELETE.
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        
        // Configura el encabezado HTTP para indicar que el contenido es JSON.
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        
        // Configura los datos de la solicitud como una cadena JSON.
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
        // Ejecuta la solicitud cURL y guarda la respuesta en la variable '$response'.
        $response = curl_exec($ch);
        
        // Cierra la sesión de cURL después de recibir la respuesta.
        curl_close($ch);
        
        // Imprime la respuesta de la API en la página.
        echo "Respuesta: " . $response;
    }
}
?>
