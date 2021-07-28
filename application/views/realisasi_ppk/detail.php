<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi Detail Per PPK</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
        </div>
        <div class="col-lg-5">
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
                            <th>Kode</th>
                            <th>Keterangan</th>
                            <th>Januari</th>
                            <th>februari</th>
                            <th>Maret</th>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Juni</th>
                            <th>Juli</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Oktober</th>
                            <th>November</th>
                            <th>Desember</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($detail as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['kode']; ?></td>
                                <td><?= $r['keterangan']; ?></td>
                                <td class="text-right"><?= $r['januari']; ?></td>
                                <td class="text-right"><?= $r['februari']; ?></td>
                                <td class="text-right"><?= $r['maret']; ?></td>
                                <td class="text-right"><?= $r['april']; ?></td>
                                <td class="text-right"><?= $r['mei']; ?></td>
                                <td class="text-right"><?= $r['juni']; ?></td>
                                <td class="text-right"><?= $r['juli']; ?></td>
                                <td class="text-right"><?= $r['agustus']; ?></td>
                                <td class="text-right"><?= $r['september']; ?></td>
                                <td class="text-right"><?= $r['oktober']; ?></td>
                                <td class="text-right"><?= $r['november']; ?></td>
                                <td class="text-right"><?= $r['desember']; ?></td>
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