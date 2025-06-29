<?php
include 'connect.php';

$data = [];
$sql = "SELECT component, expenditure_2011 FROM domestic_visitors";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Domestic Visitors Graph (2011)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@2.0.1"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .chart-container {
            width: 90%;
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            height: 420px;
        }

        #barChart {
            width: 100% !important;
            height: 100% !important;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="chart-container">
    <h2>Expenditure by Domestic Visitors (2011)</h2>
    <canvas id="barChart"></canvas>
</div>

<script>
    const ctx = document.getElementById('barChart').getContext('2d');
    const barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($data, 'component')); ?>,
            datasets: [{
                label: 'Expenditure (RM million)',
                data: <?php echo json_encode(array_column($data, 'expenditure_2011')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.6)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: true },
                zoom: {
                    zoom: {
                        wheel: { enabled: true },
                        pinch: { enabled: true },
                        mode: 'x'
                    },
                    pan: {
                        enabled: true,
                        mode: 'x'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Expenditure (RM millions)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Component'
                    },
                    ticks: {
                        maxRotation: 45,
                        minRotation: 0
                    }
                }
            }
        }
    });
</script>

</body>
</html>
