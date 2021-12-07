<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Upload</h1>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <?php if ($this->session->flashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?= $this->session->flashdata('pesan'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif ($this->session->flashdata('pesan_gagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal!</strong> <?= $this->session->flashdata('pesan_gagal'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-5">
            <a href="<?= base_url('upload/create/') . $tagihan_id; ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
        </div>
        <div class="col-lg-3">
            <form action="" method="post" autocomplete="off">
                <!-- <?= form_open(); ?> -->
                <div class="input-group">
                    <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                    <button class="btn btn-sm btn-outline-secondary" type="submit">Cari</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-8">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>No</th>
                            <th>Berkas</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($upload as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nmberkas']; ?></td>
                                <td><?= $r['keterangan']; ?></td>
                                <td><?= tanggal($r['date_created']); ?></td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('assets/files/') . $r['file']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" download>Download File</a>
                                    </div>
                                </td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('upload/delete/') . $r['id'] . '/' . $tagihan_id . '/' . $r['file']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
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
            <?= $keterangan == null ? $pagination : ''; ?>
        </div>
    </div>

</main>