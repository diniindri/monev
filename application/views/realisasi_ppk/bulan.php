<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi PPK Per Bulan</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Bulan</th>
                            <th>Realisasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        $jrealisasi = 0;
                        foreach ($ppk as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nmbulan']; ?></td>
                                <td class="text-right"><?= number_format($r['realisasi'], 0, ',', '.'); ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('realisasi-ppk/detail/') . $jenis . '/' . $kdppk . '/' . $r['kdbulan']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Detail</a>
                                    </div>
                                </td>
                            </tr>

                        <?php
                            $jrealisasi += $r['realisasi'];
                        endforeach; ?>
                        <tr>
                            <th class="text-center" colspan="2">Jumlah</th>
                            <th class="text-right"><?= number_format($jrealisasi, 0, ',', '.'); ?></th>
                            <th></th>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>