<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DNP</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
            <a href="<?= base_url('arsip'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2"> Kembali ke Halaman Sebelumnya</a>
            <a href="<?= base_url('dnp/cetak/') . $tagihan_id; ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2" target="_blank">Cetak</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <!-- <?= form_open(); ?> -->
                <div class="input-group">
                    <input type="text" name="nama" class="form-control" placeholder="Nama Pegawai">
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
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kdgol</th>
                            <th>Bruto</th>
                            <th>PPh</th>
                            <th>Netto</th>
                            <th>Rekening</th>
                            <th>Nama Bank</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($dnp as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['nama']; ?></td>
                                <td><?= $r['kdgol']; ?></td>
                                <td class="text-right"><?= number_format($r['bruto'], 0, ',', '.'); ?></td>
                                <td class="text-right"><?= number_format($r['pph'], 0, ',', '.'); ?></td>
                                <td class="text-right"><?= number_format($r['netto'], 0, ',', '.'); ?></td>
                                <td><?= $r['rekening']; ?></td>
                                <td><?= $r['nmbank']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $nama == null ? $pagination : ''; ?>
        </div>
    </div>

</main>