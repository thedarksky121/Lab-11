<!DOCTYPE html>
<html>
<head>
    <title>Domestic Tourists Expenditure (2010 & 2011)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f4f8;
            padding: 20px;
        }

        .wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
        }

        .chart-wrapper {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
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

<h2>Domestic Tourists Expenditure Comparison (2010 vs 2011)</h2>
<div class="wrapper">
    <!-- 2010 Pie Chart (Left) -->
    <div class="chart-wrapper">
        <h3>Year 2010</h3>
        <div class="chart-container">
            <canvas id="pieChart2010"></canvas>
        </div>
    </div>

    <!-- 2011 Pie Chart (Right) -->
    <div class="chart-wrapper">
        <h3>Year 2011</h3>
        <div class="chart-container">
            <canvas id="pieChart2011"></canvas>
        </div>
    </div>
</div>

<script>
    const labels = [
        'Food & beverages',
        'Transport',
        'Accommodation',
        'Shopping',
        'Expenditure before trip',
        'Other activities'
    ];

    const values2010 = [6448, 6220, 6096, 2603, 595, 1722];
    const values2011 = [7756, 7417, 4985, 3801, 801, 2249];

    const total2010 = values2010.reduce((a, b) => a + b, 0);
    const total2011 = values2011.reduce((a, b) => a + b, 0);

    // PIE CHART 2010
    new Chart(document.getElementById('pieChart2010').getContext('2d'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values2010,
                backgroundColor: ['#B5E48C', '#99D98C', '#76C893', '#52B69A', '#34A0A4', '#168AAD'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: (value) => {
                        const percent = ((value / total2010) * 100).toFixed(1);
                        return `RM ${value.toLocaleString()}\n(${percent}%)`;
                    },
                    color: '#fff',
                    font: { weight: 'bold', size: 12 }
                },
                legend: {
                    position: 'right',
                    labels: { boxWidth: 20, padding: 15 }
                }
            }
        },
        plugins: [ChartDataLabels]
    });

    // PIE CHART 2011
    new Chart(document.getElementById('pieChart2011').getContext('2d'), {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values2011,
                backgroundColor: ['#FFADAD', '#FFD6A5', '#FDFFB6', '#CAFFBF', '#9BF6FF', '#A0C4FF'],
                borderColor: '#fff',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                datalabels: {
                    formatter: (value) => {
                        const percent = ((value / total2011) * 100).toFixed(1);
                        return `RM ${value.toLocaleString()}\n(${percent}%)`;
                    },
                    color: '#333',
                    font: { weight: 'bold', size: 12 }
                },
                legend: {
                    position: 'right',
                    labels: { boxWidth: 20, padding: 15 }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
</script>

</body>
</html>
