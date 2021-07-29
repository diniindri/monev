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
            labels: ["BMN", "KND", "HUHU", "PKNSI", "Lelang", "Penilaian", "PNKNL", "Keuangan", "Kepegawaian", "OKI", "Perlengkapan", "Umum"],
            datasets: [{
                label: 'Realisasi per Unit',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                data: [3.64, 11.68, 22.94, 66.16, 44.44, 13.70, 18.62, 68.57, 58.72, 1.08, 4.50, 30.86],
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