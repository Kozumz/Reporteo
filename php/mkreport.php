<?php
    include 'header.php';
     session_start(); // Reanudar la sesión
     if (isset($_SESSION['usuario'])) {
         $nombre = $_SESSION['usuario'];
     } else {
         // Redirige o muestra un mensaje si no hay usuario en sesión
         echo "No hay usuario autenticado.";
         exit;
     }
     //echo $_SESSION['usuario'] . $_SESSION['privilegios'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar reporte</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap');

    #map {
        height: 25rem;
        width: 30rem;
        border: 0;
    }
    </style>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body>
    <script>
        priv = "<?php echo $_SESSION['privilegios']; ?>";
    </script>
     <main class="report-window" id="report-window">
         <div id="hola" style="color:black;"></div>
         <div class="new-report">
             <form id="report-data" action="newreport.php" metho="POST">
                 
                 <label for="report-date" class="rep-label">Fecha del reporte:</label>
                 <input type="date" id="report-date" name="report-date" class="rep-input"><br>
                 
                 <label for="location" class="rep-label">Ubicacion reportada:</label>
                 <input type="text" readonly id="loc" name="location" class="rep-input">
                 
                 <p style="margin:0 0 .3rem 0;">Reporte:</p>
                 <textarea name="report-textarea" id="report-textarea"></textarea>
                </form>
                <div class="map" id="map"></div>
            </div>
        </div>
        <div class="view-reports">
            <div>
                <textarea name="view-reports-txt" id="view-reports-txt" readonly></textarea>
            </div>
        </div>
    </main>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
        <script src="/Reporteo/js/showmap.js"></script>
        <script src="/Reporteo/js/useracces.js"></script>
</body>
</html>