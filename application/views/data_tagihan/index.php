<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Data Tagihan</h1>
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
            <a href="<?= base_url('data-tagihan/create'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="nomor" class="form-control" placeholder="nomor SPP/SPBy">
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
                            <th>Jenis</th>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Uraian</th>
                            <th>Detail Akun</th>
                            <th>Bruto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($tagihan as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['jenis']; ?></td>
                                <td><?= $r['nomor']; ?></td>
                                <td><?= $r['tanggal']; ?></td>
                                <td><?= $r['uraian']; ?></td>
                                <td><?= $r['detail']; ?></td>
                                <td><?= $r['bruto']; ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('data-tagihan/update/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Ubah</a>
                                        <a href="<?= base_url('data-tagihan/delete/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
                                        <a href="<?= base_url('data-tagihan/dnp/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">DNP</a>
                                        <a href="<?= base_url('data-tagihan/upload/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Upload</a>
                                        <a href="<?= base_url('data-tagihan/kirim/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Kirim</a>
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