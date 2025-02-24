<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: ../public/index.php");
    exit();
}

require_once __DIR__ . '/../../models/db_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="shortcut icon" href="../../public/imgs/icon.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | ZONKS</title>
    <link rel="stylesheet" href="../css/dashboard.css"> <!-- TODO: Fix the css stylesheet-->
</head>

<body>
  
<?php 
    include "nav.php";
?>
        <div class="main">
            <div class="topbar">
            <div class="toggle" onclick="toggleClick()"><ion-icon name="menu-outline"></ion-icon></div>
            <?php 
                include "pfp.php"
            ?>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">
                            0
                        </div>
                        <div class="cardName">Clientes</div>
                    </div>
                    <div class="iconBx"><ion-icon name="person-outline"></ion-icon></div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            0
                        </div>
                        <div class="cardName">Produtos</div>
                    </div>
                    <div class="iconBx"><ion-icon name="bag-outline"></ion-icon></div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            0
                        </div>
                        <div class="cardName">Empresas</div>
                    </div>
                    <div class="iconBx"><ion-icon name="storefront-outline"></ion-icon></div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            0
                        </div>
                        <div class="cardName">Colaboradores</div>
                    </div>
                    <div class="iconBx"><ion-icon name="people-outline"></ion-icon></div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">
                            0
                        </div>
                        <div class="cardName">Ordens de Serviço</div>
                    </div>
                    <div class="iconBx"><ion-icon name="calendar-outline"></ion-icon></div>
                </div>
            </div>

            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2 style="font-size: 20px;">Gráficos clientes mensais</h2>
                    </div>
                    <div id="chart"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- TODO: Organize archives js -->
    <script type="module" src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../js/charts.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // var dadosGrafico = <?# php echo json_encode($dadosClientesPorMes); ?>;
        // var meses = <? #php echo $mesesJson; ?>;

        // var options = {
        //     chart: {
        //         type: 'bar'
        //     },
        //     series: [{
        //         name: 'Clientes',
        //         data: dadosGrafico
        //     }],
        //     xaxis: {
        //         categories: meses
        //     }
        // };

        // var chart = new ApexCharts(document.querySelector("#chart"), options);
        // chart.render();
    </script>

</body>

</html>