<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tarik Data Pegawai Dari Gaji</h1>
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
            <a href="<?= base_url('dnp/index/') . $tagihan_id . '/a'; ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2">Sebelumnya</a>
        </div>
        <div class="col-lg-5">
            <!-- <form action="" method="post" autocomplete="off"> -->
            <?= form_open(); ?>
            <div class="input-group">
                <input type="text" name="nama" class="form-control" placeholder="nama pegawai">
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
                            <th>Rekening</th>
                            <th>Nama Bank</th>
                            <th>Nama Rekening</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($pegawai as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['nmpeg']; ?></td>
                                <td><?= $r['kdgapok']; ?></td>
                                <td><?= $r['rekening']; ?></td>
                                <td><?= $r['nm_bank']; ?></td>
                                <td><?= $r['nmrek']; ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('dnp/pilih-pegawai-gaji/') . $r['nip'] . '/' . $tagihan_id; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Pilih</a>
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
            <?= $nama == null ? $pagination : ''; ?>
        </div>
    </div>

</main>