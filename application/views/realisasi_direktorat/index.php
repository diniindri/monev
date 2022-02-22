<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi Per Unit</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
            <a href="<?= base_url('realisasi-direktorat/index/1'); ?>" class="btn btn-sm btn-outline-primary mt-1 <?= $jenis == 1 ? 'active' : ''; ?>">Per Tagihan</a>
            <a href="<?= base_url('realisasi-direktorat/index/2'); ?>" class="btn btn-sm btn-outline-primary mt-1 ml-2 <?= $jenis == 2 ? 'active' : ''; ?>">Per SP2D</a>
        </div>
        <div class="col-lg-5">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-10">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Unit</th>
                            <th>Pagu</th>
                            <th>Realisasi</th>
                            <th>Sisa Pagu</th>
                            <th>Pengembalian</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        $jpagu = 0;
                        $jrealisasi = 0;
                        $jsspb = 0;
                        foreach ($unit as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nmunit']; ?></td>
                                <td class="text-right"><?= number_format($r['pagu'], 0, ',', '.'); ?></td>
                                <td class="text-right">
                                    <a href="<?= base_url('realisasi-direktorat/bulan/') . $jenis . '/' . $r['kdunit']; ?>">
                                        <?= number_format($r['realisasi'], 0, ',', '.'); ?>
                                    </a>
                                </td>
                                <td class="text-right"><?= number_format($r['pagu'] - $r['realisasi'], 0, ',', '.'); ?></td>
                                <td class="text-right">
                                    <a href="<?= base_url('realisasi-direktorat/bulan_sspb/') . $r['kdunit']; ?>">
                                        <?= number_format($r['sspb'], 0, ',', '.'); ?>
                                    </a>
                                </td>
                                <td class="text-center"><?= number_format(($r['realisasi'] - $r['sspb']) / $r['pagu'] * 100, 2, ',', '.') . '%'; ?></td>
                            </tr>

                        <?php
                            $jpagu += $r['pagu'];
                            $jrealisasi += $r['realisasi'];
                            $jsspb += $r['sspb'];
                        endforeach;
                        $jsisa = $jpagu - $jrealisasi;
                        $jpagu > 0 ? $jpersen = ($jrealisasi - $jsspb) / $jpagu * 100 : $jpersen = 0;
                        ?>

                        <tr>
                            <th class="text-center" colspan="2">Jumlah</th>
                            <th class="text-right"><?= number_format($jpagu, 0, ',', '.'); ?></th>
                            <th class="text-right"><?= number_format($jrealisasi, 0, ',', '.'); ?></th>
                            <th class="text-right"><?= number_format($jsisa, 0, ',', '.'); ?></th>
                            <th class="text-right"><?= number_format($jsspb, 0, ',', '.'); ?></th>
                            <th class="text-center"><?= number_format($jpersen, 2, ',', '.'); ?>%</th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>