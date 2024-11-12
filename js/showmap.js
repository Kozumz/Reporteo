
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
            document.getElementById('loc').value = `Latitud: ${lat}, Longitud: ${lng}`;
        });

        