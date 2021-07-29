</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>

<!-- bar chart -->
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["BMN", "KND", "HUHU", "PKNSI", "Lelang", "PNKNL", "Penilaian", "OKI", "Kepegawaian", "Keuangan", "Perlengkapan", "Umum"],
            datasets: [{
                label: 'Realisasi per Unit',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [23, 45, 56, 34, 56, 78, 58, 89, 67, 24, 56, 12],
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
</script>

</body>

</html>