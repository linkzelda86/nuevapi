<?php
// Se incluye el archivo del controlador "procesoControlador.php" que contiene la lógica de negocio.
// Esto permite acceder a las funciones de ese controlador para realizar las acciones correspondientes.
require_once "controlador/procesoControlador.php";

// Se crea una instancia del controlador para poder utilizar sus métodos más adelante.
$procesoControlador = new procesoControlador;

// Se obtiene el tipo de solicitud HTTP (GET, POST, PUT, DELETE) para decidir qué acción tomar.
$method = $_SERVER['REQUEST_METHOD'];

// Se lee el contenido de la solicitud en formato JSON y se convierte en un array asociativo.
$input = json_decode(file_get_contents('php://input'), true);

// Se verifica si se ha pasado el parámetro 'consultar' en la URL, lo que indica una consulta por cédula.
if (isset($_GET['consultar'])) {
    // Si se solicita consultar, se obtiene la cédula desde la URL y se llama al método de consulta del controlador.
    $cedula = $_GET['consultar'];
    $datos = $procesoControlador->consultaPorCedula($cedula);
} 
// Se verifica si se ha pasado el parámetro 'insertar' en la URL y se está realizando una solicitud POST.
elseif (isset($_GET['insertar']) && $method == 'POST') {
    // Si se solicita insertar, se pasan los datos recibidos en el cuerpo de la solicitud al método de inserción.
    $datos = $procesoControlador->insertarDatos($input);
} 
// Se verifica si se ha pasado el parámetro 'modificar' en la URL y se está realizando una solicitud PUT.
elseif (isset($_GET['modificar']) && $method == 'PUT') {
    // Si se solicita modificar, se pasan los datos recibidos en el cuerpo de la solicitud al método de actualización.
    $datos = $procesoControlador->actualizarDatos($input);
} 
// Se verifica si se ha pasado el parámetro 'eliminar' en la URL y se está realizando una solicitud DELETE.
elseif (isset($_GET['eliminar']) && $method == 'DELETE') {
    // Si se solicita eliminar, se verifica que la cédula esté presente en los datos recibidos.
    $cedula = $input['cedula'] ?? null;
    // Si la cédula está presente, se llama al método de eliminación con la cédula proporcionada.
    if ($cedula) {
        $datos = $procesoControlador->eliminarDatos($cedula);
    } else {
        // Si la cédula no se proporciona, se devuelve un mensaje de error.
        $datos = ["error" => "Cédula no proporcionada"];
    }
} 
// Si ninguna de las condiciones anteriores se cumple, se devuelve un mensaje de error indicando que la solicitud no es válida.
else {
    $datos = ["error" => "Solicitud no válida"];
}

// Se convierte el resultado en formato JSON y se envía como respuesta.
echo json_encode($datos);
?>
