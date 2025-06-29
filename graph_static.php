<!DOCTYPE html>
<html>
<head>
    <title>Pie Chart with Percentages</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: #f9f9f9;
        }
        .chart-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .chart-container {
            position: relative;
            height: 400px;
            margin-top: 20px;
        }
        canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>
<body>

<div class="chart-wrapper">
    <h2 style="text-align:center;">Expenditure by Domestic Tourists (2011)</h2>
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>
</div>

<script>
    const values = [7756, 7417, 4985, 3801, 801, 2249];
    const total = values.reduce((a, b) => a + b, 0);

    const pieCtx = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: [
                'Food & beverages',
                'Transport',
                'Accommodation',
                'Shopping',
                'Expenditure before trip',
                'Other activities'
            ],
            datasets: [{
                data: values,
                backgroundColor: [
                    '#FF6384',
                    '#36A2EB',
                    '#FFCE56',
                    '#8AFF33',
                    '#FFA533',
                    '#AA33FF'
                ],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: (value, context) => {
                        let percentage = (value / total * 100).toFixed(1);
                        return percentage + '%';
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 14
                    }
                },
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 20,
                        padding: 15
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>

</body>
</html>
