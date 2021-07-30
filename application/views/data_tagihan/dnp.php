<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">DNP</h1>
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
            <a href="<?= base_url('pegawai/create/') ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
            <a href="<?= base_url('pegawai/tarik-pegawai-gaji/') ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2"> Tarik Data Gaji</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <div class="input-group">
                    <input type="text" name="nmpeg" class="form-control" placeholder="nama pegawai">
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
                            <th>golongan</th>
                            <th>bruto</th>
                            <th>potongan</th>
                            <th>netto</th>
                            <th>Rekening</th>
                            <th>Bank</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($dnp as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nip']; ?></td>
                                <td><?= $r['nmpeg']; ?></td>
                                <td><?= $r['golongan']; ?></td>
                                <td><?= $r['bruto']; ?></td>
                                <td><?= $r['potongan']; ?></td>
                                <td><?= $r['netto']; ?></td>
                                <td><?= $r['rekening']; ?></td>
                                <td><?= $r['bank']; ?></td>
                                <td class="pb-0 pr-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('pegawai/update/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Ubah</a>
                                        <a href="<?= base_url('pegawai/delete/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
                                        <a href="<?= base_url('pegawai/cetak/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Cetak</a>
                                        <a href="<?= base_url('pegawai/kirim/') ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Kirim</a>
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
            <?= $nmpeg == null ? $pagination : ''; ?>
        </div>
    </div>

</main>