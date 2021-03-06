<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">PPSPM</h1>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <!-- <?= form_open(); ?> -->
                <div class="input-group">
                    <input type="text" name="nomor" class="form-control" placeholder="nomor">
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
                            <th>Nomor Register</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($register as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nomor'] . $r['ekstensi']; ?></td>
                                <td><?= tanggal($r['tanggal']); ?></td>
                                <td class="text-center"><?= $r['jumlah']; ?></td>
                                <td class="text-right"><?= number_format($r['total'], 0, ',', '.'); ?></td>
                                <td class="pb-0 pr-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('ppspm/detail/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Detail</a>
                                        <a href="<?= base_url('public/downloadcode/') . $r['file']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" target="_blank">Preview</a>
                                        <a href="<?= base_url('ppspm/terima/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Terima</a>
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