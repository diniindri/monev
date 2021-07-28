<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitoring Tagihan</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="nomor" class="form-control" placeholder="Nomor SPP/SPBy">
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
                            <th>Jenis Tagihan</th>
                            <th>Nomor Tagihan</th>
                            <th>Jenis Dokumen</th>
                            <th>Tanggal Tagihan</th>
                            <th>Nomor SP2D</th>
                            <th>Tanggal SP2D</th>
                            <th>Bruto</th>
                            <th>Potongan</th>
                            <th>Netto</th>
                            <th>Detail Akun</th>
                            <th>Unit</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($tagihan as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['jenis']; ?></td>
                                <td><?= $r['nomor']; ?></td>
                                <td><?= $r['dokumen']; ?></td>
                                <td><?= $r['tanggal']; ?></td>
                                <td><?= $r['nosp2d']; ?></td>
                                <td><?= $r['tglsp2d']; ?></td>
                                <td><?= $r['bruto']; ?></td>
                                <td><?= $r['potongan']; ?></td>
                                <td><?= $r['netto']; ?></td>
                                <td><?= $r['detail']; ?></td>
                                <td><?= $r['unit']; ?></td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $nomor == null ? $pagination : ''; ?>
        </div>
    </div>
</main>