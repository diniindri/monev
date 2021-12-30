</div>
</div>

<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>

<!-- bar chart -->
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            // labels: ["BMN", "KND", "HUHU", "PKNSI", "Lelang", "Penilaian", "PNKNL", "Keuangan", "Kepegawaian", "OKI", "Perlengkapan", "Umum"],
            labels: [
                <?php foreach ($unit as $r) : ?> "<?= $r['nmunit']; ?>",
                <?php endforeach; ?>
            ],
            datasets: [{
                label: 'Realisasi per Unit',
                backgroundColor: 'rgba(161, 198, 247, 1)',
                borderColor: 'rgb(47, 128, 237)',
                // data: [3.64, 11.68, 22.94, 66.16, 44.44, 13.70, 18.62, 68.57, 58.72, 1.08, 4.50, 30.86],
                data: [
                    <?php foreach ($unit as $r) : ?> <?= $r['realisasi'] / $r['pagu'] * 100; ?>,
                    <?php endforeach; ?>

                ],
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