<?php
// Crea un array vacío '$datos' para almacenar los datos enviados desde el formulario.
$datos = [];

// Asigna los valores recibidos mediante la solicitud POST a los respectivos índices del array '$datos'.
$datos['cedula'] = $_POST['cedula'];   // Cédula del estudiante.
$datos['nombres'] = $_POST['nombres']; // Nombres del estudiante.
$datos['apellidos'] = $_POST['apellidos']; // Apellidos del estudiante.
$datos['curso'] = $_POST['curso'];     // Curso del estudiante.
$datos['paralelo'] = $_POST['paralelo']; // Paralelo del estudiante.

// Crea una nueva instancia de la clase 'modificar' pasando el array '$datos' como parámetro al constructor.
$modificar = new modificar($datos);

// Llama al método 'modificar' de la clase 'modificar' para realizar la solicitud a la API y modificar los datos.
$modificar->modificar();

// Definición de la clase 'modificar'.
class modificar
{
    // Propiedad pública '$datos' que almacenará los datos a modificar.
    public $datos;

    // Constructor de la clase que recibe los datos y los asigna a la propiedad '$datos'.
    function __construct($datos)
    {
        $this->datos = $datos;
    }

    // Método 'modificar' que realiza la solicitud PUT a la API para modificar los datos del estudiante.
    function modificar()
    {
        // Define la URL de la API a la que se enviarán los datos.
        $url = "http://localhost/nuevapi/?modificar";

        // Prepara el array '$data' que contiene los datos que se enviarán en la solicitud PUT.
        $data = [
            "cedula" => $this->datos['cedula'],        // Cédula del estudiante.
            "nombre" => $this->datos['nombres'],       // Nombres del estudiante.
            "apellido" => $this->datos['apellidos'],   // Apellidos del estudiante.
            "nombrep" => $this->datos['curso'],        // Curso del estudiante.
            "paralelo" => $this->datos['paralelo']     // Paralelo del estudiante.
        ];

        // Inicializa una sesión cURL con la URL de la API.
        $ch = curl_init($url);

        // Configura cURL para que la respuesta se devuelva como una cadena, no impresa directamente.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Configura cURL para que siga las redirecciones si la URL cambia.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Seguir redirecciones

        // Configura cURL para que la solicitud sea de tipo PUT (modificación).
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        // Configura el encabezado HTTP para indicar que el contenido enviado será en formato JSON.
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);

        // Convierte el array '$data' a formato JSON y lo envía como el cuerpo de la solicitud.
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        // Ejecuta la solicitud cURL y guarda la respuesta en la variable '$response'.
        $response = curl_exec($ch);

        // Cierra la sesión cURL después de obtener la respuesta.
        curl_close($ch);

        // Imprime la respuesta recibida de la API en la página.
        echo "Respuesta: " . $response;
    }
}

?>
