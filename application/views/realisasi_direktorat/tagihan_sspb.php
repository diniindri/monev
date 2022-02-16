<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Detail Tagihan</h1>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>No</th>
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th>KRO</th>
                            <th>RO</th>
                            <th>Komponen</th>
                            <th>Subkomponen</th>
                            <th>Akun</th>
                            <th>Realisasi</th>
                            <th>Pengembalian</th>
                            <th>Uraian</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $jrealisasi = 0;
                        $jsspb = 0;
                        foreach ($unit as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['program']; ?></td>
                                <td><?= $r['kegiatan']; ?></td>
                                <td><?= $r['kro']; ?></td>
                                <td><?= $r['ro']; ?></td>
                                <td><?= $r['komponen']; ?></td>
                                <td><?= $r['subkomponen']; ?></td>
                                <td><?= $r['akun']; ?></td>
                                <td class="text-right"><?= number_format($r['realisasi'], 0, ',', '.'); ?></td>
                                <td class="text-right"><?= number_format($r['sspb'], 0, ',', '.'); ?></td>
                                <td><?= $r['uraian']; ?></td>
                            </tr>
                        <?php
                            $jrealisasi += $r['realisasi'];
                            $jsspb += $r['sspb'];
                        endforeach;
                        ?>
                        <tr>
                            <th class="text-center" colspan="8">Jumlah</th>
                            <th class="text-right"><?= number_format($jrealisasi, 0, ',', '.'); ?></th>
                            <th class="text-right"><?= number_format($jsspb, 0, ',', '.'); ?></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</main>