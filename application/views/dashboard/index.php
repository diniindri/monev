<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="row">
        <div class="col">
            <div class="d-flex flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="display-6">Realisasi <?= $nmsatker; ?></h1> <span class="mt-1 ml-2" style="font-size: large;">(PPK <?= $nmppk; ?>)</span>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <a href="<?= base_url('dashboard/index/1'); ?>" class="btn btn-sm btn-outline-primary <?= $jenis == 1 ? 'active' : ''; ?>">Per Tagihan</a>
            <a href="<?= base_url('dashboard/index/2'); ?>" class="btn btn-sm btn-outline-primary ml-2 <?= $jenis == 2 ? 'active' : ''; ?>">Per SP2D</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
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
                            $jpagu = 0;
                            $jrealisasi = 0;
                            $jsspb = 0;
                            foreach ($realisasi as $r) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $r['nama']; ?></td>
                                    <td class="text-right"><?= number_format($r['pagu'], 0, ',', '.'); ?></td>
                                    <td class="text-right"><?= number_format($r['realisasi'], 0, ',', '.'); ?></td>
                                    <td class="text-right"><?= number_format($r['pagu'] - $r['realisasi'], 0, ',', '.'); ?></td>
                                    <td class="text-right"><?= number_format(($r['realisasi'] - $r['sspb']) / $r['pagu'] * 100, 2, ',', '.'); ?>%</td>
                                </tr>
                            <?php
                                $jpagu += $r['pagu'];
                                $jrealisasi += $r['realisasi'];
                                $jsspb += $r['sspb'];
                            endforeach;
                            $jsisa = $jpagu - $jrealisasi;
                            $jpagu == 0 ? $jpersen = 0 : $jpersen = ($jrealisasi - $jsspb) / $jpagu * 100;
                            ?>
                            <tr>
                                <th class="text-center" colspan="2">Jumlah</th>
                                <th class="text-right"><?= number_format($jpagu, 0, ',', '.'); ?></th>
                                <th class="text-right"><?= number_format($jrealisasi, 0, ',', '.'); ?></th>
                                <th class="text-right"><?= number_format($jsisa, 0, ',', '.'); ?></th>
                                <th class="text-right"><?= number_format($jpersen, 2, ',', '.'); ?>%</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mb-3 mr-1 ml-1">
                <div class="card chart-container">
                    <canvas id="chart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>Realisasi per PPK</b>
                        <span><b>Persentase</b></span>
                    </li>
                    <?php foreach ($ppk as $r) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $r['nmppk']; ?>
                            <?php
                            if ((($r['realisasi'] - $r['sspb']) / $r['pagu'] * 100) < 40) {
                                $warna = 'bg-danger';
                            } else if ((($r['realisasi'] - $r['sspb']) / $r['pagu'] * 100) < 70) {
                                $warna = 'bg-warning';
                            } else {
                                $warna = 'bg-success';
                            }
                            ?>
                            <span class="badge <?= $warna; ?> rounded-pill"><?= number_format(($r['realisasi'] - $r['sspb']) / $r['pagu'] * 100, 2, ',', '.'); ?>%</span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>


</main>