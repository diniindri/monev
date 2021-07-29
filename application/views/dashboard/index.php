<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Realisasi Kantor Pusat DJKN</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
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
        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>Realisasi per PPK</b>
                    <span><b>Persentase</b></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Wielly Prasekti
                    <span class="badge bg-danger rounded-pill">3,53%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Nandang Supriyadi
                    <span class="badge bg-danger rounded-pill">12,31%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Eny Susanti
                    <span class="badge bg-danger rounded-pill">16,19%</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Anwar Sulaiman
                    <span class="badge bg-danger rounded-pill">24,57%</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="card chart-container">
                <canvas id="chart"></canvas>
            </div>
        </div>
        <div class="col-lg-4">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Yuzuardi Haban
                <span class="badge bg-primary rounded-pill">79,12%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Abdul Ghofar
                <span class="badge bg-primary rounded-pill">43,02%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Jundi Widiantoro
                <span class="badge bg-danger rounded-pill">17,45%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Istina Setya Lestari
                <span class="badge bg-warning rounded-pill">34,20%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Mufid Hamdani
                <span class="badge bg-primary rounded-pill">68,85%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Lilik Hermawan
                <span class="badge bg-danger rounded-pill">1,67%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Bagus Kurniawan
                <span class="badge bg-primary rounded-pill">61,13%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Kiki Normansyah
                <span class="badge bg-danger rounded-pill">14,94%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Moh. Arif Rochman
                <span class="badge bg-danger rounded-pill">1,08%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                R. Hariyadi Murti Kurniawan
                <span class="badge bg-danger rounded-pill">4,50%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Eko Hardiyanto
                <span class="badge bg-danger rounded-pill">22,69%</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Wahyu Setiadi
                <span class="badge bg-primary rounded-pill">40,66%</span>
            </li>
        </div>

    </div>


</main>