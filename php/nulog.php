<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo reporte</title>
</head>
<body>
    <?php
    include 'header.html';
     session_start(); // Reanudar la sesión
     if (isset($_SESSION['usuario'])) {
         $nombre = $_SESSION['usuario'];
     } else {
         // Redirige o muestra un mensaje si no hay usuario en sesión
         echo "No hay usuario autenticado.";
         exit;
     }
     ?>
    
</body>
</html>