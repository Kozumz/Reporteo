<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "josuecmm14";
$dbname = "reportes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener los reportes
$sql = "SELECT ID_reporte, fecha_reporte, descripcion, ubicacion FROM reporte ORDER BY fecha_reporte DESC";
$result = $conn->query($sql);

$reportes = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $reportes[] = $row;
    }
}

$conn->close();

// Devolver los reportes en formato JSON
header('Content-Type: application/json');
echo json_encode($reportes);
?>