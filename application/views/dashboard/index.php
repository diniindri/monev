<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Well done!</h4>
                <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="card chart-container">
                <canvas id="chart"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>Realisasi per PPK</b>
                    <span><b>Persentase</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    PPK BMN
                    <span class="badge bg-primary rounded-pill">14%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    PPK KND
                    <span class="badge bg-primary rounded-pill">2%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    PPK Sekretariat
                    <span class="badge bg-primary rounded-pill">1%</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Jenis Belanja</th>
                            <th>Pagu</th>
                            <th>Realisasi</th>
                            <th>Sisa Pagu</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($realisasi as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['jenis']; ?></td>
                                <td class="text-right"><?= $r['pagu']; ?></td>
                                <td class="text-right"><?= $r['realisasi']; ?></td>
                                <td class="text-right"><?= $r['sisa']; ?></td>
                                <td class="text-center"><?= $r['persentase']; ?></td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>