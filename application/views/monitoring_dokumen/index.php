<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Monitoring Dokumen</h1>
    </div>
    <div class="row">
        <div class="col">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Sekilas Info!</h4>
                <p>pemantauan kelengkapan dokumen tagihan yang telah diunggah sebagai kelengkapan digitalisasi arsip pelaksanaan anggaran</p>
                <hr>
                <p class="mb-0">Dokumen tersedia apabila indikator tombol berwarna hijau</p>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="tagihan" class="form-control" placeholder="Nomor SPP/SPBy">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Jenis Tagihan</th>
                            <th>Nomor Tagihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($dokumen as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['jenis']; ?></td>
                                <td><?= $r['nomor']; ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('data-tagihan/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">SPP/SPBy</a>
                                        <a href="<?= base_url('data-tagihan/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Lampiran SPP/SPBy</a>
                                        <a href="<?= base_url('data-tagihan/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">SPM</a>
                                        <a href="<?= base_url('data-tagihan/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Lampiran SPM</a>
                                        <a href="<?= base_url('data-tagihan/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Bukti Payroll</a>
                                    </div>
                                </td>
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