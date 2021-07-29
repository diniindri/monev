<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/css/cdb.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/cdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap@1.0.0/js/bootstrap.min.js">
    </script>
    <script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>

    <title>How to create bootstrap charts using bootstrap 5 and Contrast</title>
    <style>
        .chart-container {
            width: 50%;
            height: 50%;
            margin: auto;
        }
    </style>
</head>

<body>

    <div class="card chart-container">
        <canvas id="chart"></canvas>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>


<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["sunday", "monday", "tuesday",
                "wednesday", "thursday", "friday", "saturday"
            ],
            datasets: [{
                label: 'Last week',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [3000, 4000, 2000, 5000, 8000, 9000, 2000],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        },
    });
</script> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../contrast-bootstrap-pro/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../contrast-bootstrap-pro/css/cdb.css" />
    <script src="../contrast-bootstrap-pro/js/cdb.js"></script>
    <script src="../contrast-bootstrap-pro/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/9d1d9a82d2.js" crossorigin="anonymous"></script>

    <title>How to create bootstrap charts using bootstrap 5</title>
</head>
<style>
    .chart-container {
        width: 50%;
        height: 50%;
        margin: auto;
    }
</style>

<body>
    <div class="card chart-container">
        <canvas id="chart"></canvas>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>

<!-- area chart -->
<!-- <script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["sunday", "monday", "tuesday",
                "wednesday", "thursday", "friday", "saturday"
            ],
            datasets: [{
                label: 'Last week',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [3000, 4000, 2000, 5000, 8000, 9000, 2000],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        },
    });
</script> -->

<!-- bar chart -->
<!-- <script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["rice", "yam", "tomato", "potato",
                "beans", "maize", "oil"
            ],
            datasets: [{
                label: 'food Items',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [300, 400, 200, 500, 800, 900, 200],
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        },
    });
</script> -->

<!-- pie chart -->
<!-- <script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["rice", "yam", "tomato", "potato",
                "beans", "maize", "oil"
            ],
            datasets: [{
                label: 'food Items',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [30, 40, 20, 50, 80, 90, 20],
            }]
        },
    });
</script> -->

<!-- doughnut chart -->
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["rice", "yam", "tomato", "potato", "beans",
                "maize", "oil"
            ],
            datasets: [{
                label: 'food Items',
                data: [30, 40, 20, 50, 80, 90, 20],
                backgroundColor: ["#0074D9", "#FF4136", "#2ECC40",
                    "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
                    "#001f3f", "#39CCCC", "#01FF70", "#85144b",
                    "#F012BE", "#3D9970", "#111111", "#AAAAAA"
                ]
            }]
        },
    });
</script>

</html>