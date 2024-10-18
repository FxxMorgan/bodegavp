<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Despachos</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Registro de Despachos</h1>

        <form id="despachoForm" class="mb-5">
            <div class="mb-3">
                <label for="nro_guia" class="form-label">N° de Guía:</label>
                <input type="text" class="form-control" id="nro_guia" name="nro_guia" required>
            </div>

            <div class="mb-3">
                <label for="cliente" class="form-label">Cliente:</label>
                <select class="form-select" id="cliente" name="cliente"></select>
            </div>

            <div class="mb-3">
                <label for="chofer" class="form-label">Chofer:</label>
                <select class="form-select" id="chofer" name="chofer"></select>
            </div>

            <div class="mb-3">
                <label for="destino" class="form-label">Destino:</label>
                <select class="form-select" id="destino" name="destino"></select>
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
            </div>

            <div class="mb-3">
                <label for="hora_salida" class="form-label">Hora de Salida:</label>
                <input type="time" class="form-control" id="hora_salida" name="hora_salida">
            </div>

            <div class="mb-3">
                <label for="hora_llegada" class="form-label">Hora de Llegada:</label>
                <input type="time" class="form-control" id="hora_llegada" name="hora_llegada">
            </div>

            <div class="mb-3">
                <label for="observaciones" class="form-label">Observaciones:</label>
                <textarea class="form-control" id="observaciones" name="observaciones"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Despacho</button>
        </form>

        <h2 class="text-center mb-4">Listado de Despachos</h2>

        <table id="despachosTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>N° Guía</th>
                    <th>Cliente</th>
                    <th>Chofer</th>
                    <th>Destino</th>
                    <th>Fecha</th>
                    <th>Hora de Salida</th>
                    <th>Hora de Llegada</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <canvas id="chartDespachos" class="mt-5"></canvas>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Cargar datos de despachos
            fetch('despachos.php')
                .then(response => response.json())
                .then(data => {
                    const table = $('#despachosTable').DataTable({
                        data: data,
                        columns: [
                            { data: 'nro_guia' },
                            { data: 'cliente' },
                            { data: 'chofer' },
                            { data: 'destino' },
                            { data: 'fecha' },
                            { data: 'hora_salida' },
                            { data: 'hora_llegada' }
                        ]
                    });

                    // Generar gráfico con Chart.js
                    const ctx = document.getElementById('chartDespachos').getContext('2d');
                    const chart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.map(d => d.fecha),
                            datasets: [{
                                label: '# de Despachos',
                                data: data.map(d => 1),
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        }
                    });
                });

            // Enviar formulario para crear nuevo despacho
            $('#despachoForm').submit(function(e) {
                e.preventDefault();

                const despachoData = {
                    nro_guia: $('#nro_guia').val(),
                    cliente_id: $('#cliente').val(),
                    chofer_id: $('#chofer').val(),
                    destino_id: $('#destino').val(),
                    fecha: $('#fecha').val(),
                    hora_salida: $('#hora_salida').val(),
                    hora_llegada: $('#hora_llegada').val(),
                    observaciones: $('#observaciones').val()
                };

                fetch('despachos.php', {
                    method: 'POST',
                    body: JSON.stringify(despachoData),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(result => {
                    const notyf = new Notyf();
                    notyf.success(result.message);
                    $('#despachoForm')[0].reset();
                });
            });
        });
    </script>
</body>
</html>
