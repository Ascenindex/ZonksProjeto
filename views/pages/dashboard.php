<?php
session_start();
// error_reporting(0);

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
<div class="container">
<div class="navigation">
        <ul>
            <li>
                <img src="../../public/imgs/zonks-logo-branca.png" alt="LOGO" width="250" height="100" class="logo">
            </li>
            <li>
                <a href="dashboard.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="calendario.php">
                    <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                    <span class="title">Calendário</span>
                </a>
            </li>
            <li>
                <a href="cadastrar.php">
                    <span class="icon"><ion-icon name="person-add-outline"></ion-icon></span>
                    <span class="title">Cadastrar clientes</span>
                </a>
            </li>
            <li>
                <a href="cadastrarproduto.php">
                    <span class="icon"><ion-icon name="bag-add-outline"></ion-icon></span>
                    <span class="title">Cadastrar produtos</span>
                </a>
            </li>
            <li>
                <a href="cadastrarempresa.php">
                    <span class="icon"><ion-icon name="storefront-outline"></ion-icon></span>
                    <span class="title">Cadastrar empresa</span>
                </a>
            </li>
            <li>
                <a href="colaboradores.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">Colaboradores</span>
                </a>
            </li>
            <li>
                <a href="config.php">
                    <span class="icon"><ion-icon name="settings-outline"></ion-icon></span>
                    <span class="title">Configurações</span>
                </a>
            </li>

            <li>
                <a href="../../controller/logout.php">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Log Out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="main">
        <div class="topbar">
            <div class="toggle"><ion-icon name="menu-outline"></ion-icon></div>  
            <div class="user" onclick="entrarPerfil()">
                <?php echo $_SESSION["imagemHTML"]; ?>
            </div>
        </div>

        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">
                    </div>
                    <div class="cardName">Clientes</div>
                </div>
                <div class="iconBx"><ion-icon name="person-outline"></ion-icon></div>
            </div>
        </div>

        <div class="details">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2 style="font-size: 20px;">Gráficos clientes mensais</h2>
                </div>
                <div id="chart"></div>
            </div>

            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2>Último Cliente Cadastrado</h2>
                </div>
                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"><img src="../../public/imgs/customer02.jpg" alt=""></div>
                        </td>
                        <td>
                            <h4></span></h4>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- TODO: Organize archives js -->
<script src="../js/main.js"></script>
<script src="../js/main_v2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="../js/charts.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
    var dadosGrafico = <?php echo json_encode($dadosClientesPorMes); ?>;
    var meses = <?php echo $mesesJson; ?>;

    var options = {
        chart: {
            type: 'bar'
        },
        series: [{
            name: 'Clientes',
            data: dadosGrafico
        }],
        xaxis: {
            categories: meses
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>

</body>
</html>
