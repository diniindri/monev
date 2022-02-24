<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pagu</h1>
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
            <a href="<?= base_url('pagu/create'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1"> Tambah Data</a>
            <a href="<?= base_url('pagu/impor'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2"> Impor Data</a>
            <a href="<?= base_url('pagu/delete-all'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2" onclick="return confirm('Apakah Anda yakin akan menghapus semua data ini?');"> Hapus Semua</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <!-- <?= form_open(); ?> -->
                <div class="input-group">
                    <input type="text" name="kro" class="form-control" placeholder="KRO">
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
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th>KRO</th>
                            <th>RO</th>
                            <th>Komponen</th>
                            <th>Subkomponen</th>
                            <th>Akun</th>
                            <th>Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($pagu as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['program']; ?></td>
                                <td><?= $r['kegiatan']; ?></td>
                                <td><?= $r['kro']; ?></td>
                                <td><?= $r['ro']; ?></td>
                                <td><?= $r['komponen']; ?></td>
                                <td><?= $r['subkomponen']; ?></td>
                                <td><?= $r['akun']; ?></td>
                                <td class="text-right"><?= number_format($r['anggaran'], 0, ',', '.'); ?></td>
                                <td class="pb-0 pr-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('pagu/update/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Ubah</a>
                                        <a href="<?= base_url('pagu/delete/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
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
            <?= $kro == null ? $pagination : ''; ?>
        </div>
    </div>

</main>