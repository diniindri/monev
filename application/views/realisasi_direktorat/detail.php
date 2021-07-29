<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi Detail Per Direktorat</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-8">
            <?php foreach ($bulan as $b) : ?>
                <a href="<?= base_url('realisasi-direktorat/detail/') . $b; ?>" class="btn btn-sm btn-outline-secondary <?= $b == $bln ? 'active' : '' ?> ml-1 mt-2 mb-2"><?= $b; ?></a>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-4">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="kode" class="form-control" placeholder="Kode">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Detail Akun</th>
                            <th>Keterangan</th>
                            <th>PPK</th>
                            <th>Januari</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($detail as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['kode']; ?></td>
                                <td><?= $r['keterangan']; ?></td>
                                <td><?= $r['ppk']; ?></td>
                                <td class="text-right"><?= $r['januari']; ?></td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $kode == null ? $pagination : ''; ?>
        </div>
    </div>
</main>