<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Reporteo/css/styles.css">
    <title>Reportes en Vivo</title>
    <style>
        .report {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .report-header {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .report-body {
            margin-bottom: 5px;
        }
        .report-footer {
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div style="text-align:center;"><h1>Reportes</h1></div>
    <div id="reports-container"></div>

    <script>
        // Función para cargar reportes desde la base de datos
        function loadReports() {
            fetch('/Reporteo/php/getReports.php')
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('reports-container');
                    container.innerHTML = ''; // Limpiar el contenedor
                    data.forEach(report => {
                        const reportElement = document.createElement('div');
                        reportElement.className = 'report';
                        reportElement.innerHTML = `
                            <div class="report-header">ID: ${report.ID_reporte}</div>
                            <div class="report-body">${report.descripcion}</div>
                            <div class="report-footer">
                                Fecha: ${report.fecha_reporte} | Ubicación: ${report.ubicacion}
                            </div>
                        `;
                        container.appendChild(reportElement);
                    });
                })
                .catch(error => console.error('Error al cargar los reportes:', error));
        }

        // Cargar reportes al cargar la página
        window.onload = loadReports;

        // Recargar reportes cada 30 segundos
        setInterval(loadReports, 30000);
    </script>
</body>
</html>