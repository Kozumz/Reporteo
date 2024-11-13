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

$date = $_POST['report-date'];
$location = $_POST['loc'];
$description = $_POST['report-textarea'];

$query = "INSERT INTO reporte (fecha_reporte, descripcion, ubicacion) VALUES ('$date', '$description', '$location')";
$conn->query($query);
$conn->close();

header('Location: /Reporteo/php/mkreport.php');