    <?php
        session_start(); // Reanudar la sesión
        include 'header.php';
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
     <main class="report-window" id="report-window">
         <div class="new-report">
            <form id="report-data" action="submitReport.php" method="POST">
                 
                <label for="report-date" class="rep-label">Fecha del reporte:</label>
                <input type="date" id="report-date" name="report-date" class="rep-input"><br>
                 
                <label for="location" class="rep-label">Ubicacion reportada:</label>
                <input type="text" readonly id="loc" name="loc" class="rep-input">
                 
                <p style="margin:0 0 .3rem 0;">Reporte:</p>

                <textarea name="report-textarea" id="report-textarea"></textarea>
                
                <button type="submit" class="rep-button">Enviar reporte</button>

            </form>
                <div class="map" id="map"></div>
            
            </div>
        </div>
       
        <div class="view-reports">
            <div class="live-rep" ><iframe src="livereports.php" frameborder="0" class="rep-frame"></iframe></div>
        </div>
    </main>
        <script src="/Reporteo/js/useracces.js"></script>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            <script src="/Reporteo/js/showmap.js"></script>

</body>
</html>

