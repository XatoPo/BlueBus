<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herramientas de Administrador</title>
    <link rel="shortcut icon" href="images/BlueBus_logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/herramientas_style.css" rel="stylesheet" type="text/css" />
    <link href="css/navbar.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php require_once "components/navbar.php"; ?>

    <header class="container mt-5 mb-4 text-center">
        <h1 class="display-4">Herramientas de Administrador</h1>
    </header>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Mantenimiento
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="crudReserva.php"><i class="bi bi-calendar-check mr-1"></i> Reservas</a></li>
                        <li class="list-group-item"><a href="crudUsuario.php"><i class="bi bi-person mr-1"></i> Usuarios</a></li>
                        <li class="list-group-item"><a href="crudViaje.php"><i class="bi bi-bus-front-fill mr-1"></i> Viajes</a></li>
                        <li class="list-group-item"><a href="crudDestino.php"><i class="bi bi-geo-fill mr-1"></i> Destinos</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Reportes
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="reporteVentas.php"><i class="bi bi-file-text"></i> Ventas</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header custom-header">
                        Reporte de Ventas en Bruto por Mes
                    </div>
                    <div class="card-body">
                        <canvas id="ventasPorMesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer id="contacto" class="bg-info text-white text-center py-4">
        <div class="container">
            <p class="mb-0"><i class="bi bi-telephone"></i> Teléfono: +51 992 568 742 | <i class="bi bi-geo-alt"></i> Dirección: Av. Javier Prado Este 123, San Isidro, Lima, Perú</p>
            <p class="mb-0"><i class="bi bi-envelope"></i> Email: info@bluebus.com</p>
        </div>
    </footer>

    <!-- Scripts de JavaScript y Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Obtener datos de la base de datos usando AJAX
        fetch('obtenerVentasPorMes.php')
            .then(response => response.json())
            .then(data => {
                // Configuración del gráfico
                const ventasPorMes = {
                    labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    datasets: [{
                        label: 'Ventas',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)', // Rojo
                            'rgba(54, 162, 235, 0.6)', // Azul
                            'rgba(255, 206, 86, 0.6)', // Amarillo
                            'rgba(75, 192, 192, 0.6)', // Verde
                            'rgba(153, 102, 255, 0.6)', // Morado
                            'rgba(255, 159, 64, 0.6)', // Naranja
                            'rgba(54, 162, 235, 0.6)', // Azul
                            'rgba(255, 99, 132, 0.6)', // Rojo
                            'rgba(75, 192, 192, 0.6)', // Verde
                            'rgba(153, 102, 255, 0.6)', // Morado
                            'rgba(255, 206, 86, 0.6)', // Amarillo
                            'rgba(255, 159, 64, 0.6)' // Naranja
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 2,
                        barThickness: 'flex',
                        hoverBackgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(255, 159, 64, 0.8)'
                        ],
                        hoverBorderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(255, 159, 64, 1)'
                        ]
                    }]
                };

                const config = {
                    type: 'bar',
                    data: ventasPorMes,
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top',
                                labels: {
                                    color: '#343a40',
                                    font: {
                                        size: 14,
                                        weight: 'bold'
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                titleColor: '#fff',
                                bodyColor: '#fff'
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: true,
                                    color: 'rgba(0, 0, 0, 0.1)'
                                },
                                ticks: {
                                    color: '#495057',
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            y: {
                                beginAtZero: true,
                                grid: {
                                    display: true,
                                    color: 'rgba(0, 0, 0, 0.1)'
                                },
                                ticks: {
                                    color: '#495057',
                                    font: {
                                        size: 12
                                    }
                                }
                            }
                        }
                    }
                };

                // Inicialización del gráfico
                const ventasPorMesChart = new Chart(
                    document.getElementById('ventasPorMesChart'),
                    config
                );
            });
    </script>
</body>

</html>
