<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi</h1>
    </div>
    <div class="row">
        <div class="col">
            <?php if ($this->session->flashdata('berhasil')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> <?= $this->session->flashdata('berhasil'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif ($this->session->flashdata('gagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> <?= $this->session->flashdata('gagal'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
            <a href="<?= base_url('tagihan'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2">Halaman Sebelumnya</a>
            <a href="<?= base_url('realisasi/tarik-detail-akun/') . $tagihan_id; ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2"> Tarik Detail Akun</a>
        </div>
        <div class="col-lg-5">
            <form action="" method="post" autocomplete="off">
                <!-- <?= form_open(); ?> -->
                <div class="input-group">
                    <input type="text" name="kro" class="form-control" placeholder="KRO">
                    <input type="text" name="ro" class="form-control" placeholder="RO">
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
                            <th>Realisasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($realisasi as $r) :
                            $kode = $r['program'] . $r['kegiatan'] . $r['kro'] . $r['ro'] . $r['komponen'] . $r['subkomponen'] . $r['akun'];
                        ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['program']; ?></td>
                                <td><?= $r['kegiatan']; ?></td>
                                <td><?= $r['kro']; ?></td>
                                <td><?= $r['ro']; ?></td>
                                <td><?= $r['komponen']; ?></td>
                                <td><?= $r['subkomponen']; ?></td>
                                <td><?= $r['akun']; ?></td>
                                <td class="text-right"><?= number_format($r['realisasi'], 0, ',', '.'); ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('realisasi/update/') . $r['id'] . '/' . $tagihan_id . '/' . $kode; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Realisasi</a>
                                        <a href="<?= base_url('realisasi/delete/') . $r['id'] . '/' . $tagihan_id; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menghapus data ini?');">Hapus</a>
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