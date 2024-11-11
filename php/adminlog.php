<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap');

    /* Estilos para el mapa */
    #map {
        height: 450px;
        width: 600px;
        border: 0;
    }
    </style>

    <title>Página Principal</title>

    <!-- Incluye el CSS de Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <?php include 'header.html'; ?>

    <!-- Contenedor del mapa -->
    <div class="map" id="map"></div>

    <!-- Lugar donde se mostrará la latitud y longitud seleccionadas -->
    <p>Coordenadas seleccionadas: <span id="coordinates">Ninguna</span></p>

    <!-- Incluye el script de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Inicializa el mapa y establece una vista inicial
        const map = L.map('map').setView([20.5655, -103.2246], 15); // Ubicación inicial CUTonala

        // Carga los mapas de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        let marker;

        // Evento para obtener la ubicación al hacer clic en el mapa
        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            // Si ya existe un marcador, muévelo a la nueva ubicación
            if (marker) {
                marker.setLatLng(e.latlng);
            } else {
                // Si no, crea un nuevo marcador en la ubicación seleccionada
                marker = L.marker(e.latlng).addTo(map);
            }

            // Muestra las coordenadas seleccionadas
            document.getElementById("coordinates").textContent = `Latitud: ${lat}, Longitud: ${lng}`;
        });
    </script>
    
</body>
</html>

</html>