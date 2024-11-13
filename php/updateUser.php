<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$pass = "josuecmm14";
$bd = "reportes";

$conexion = new mysqli($host, $usuario, $pass, $bd);

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Obtener los datos enviados desde el cliente
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$privilegios = $data['privilegios'];

// Actualizar los privilegios del usuario
$query = "UPDATE usuario SET privilegios = ? WHERE ID = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("si", $privilegios, $id);

if ($stmt->execute()) {
    alert("Exito");
} else {
    alert("Fracaso");
}

$stmt->close();
$conexion->close();
?>