<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bendahara</h1>
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
                    <strong>Perhatian!</strong> <?= $this->session->flashdata('gagal'); ?>
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php elseif ($this->session->flashdata('pesan')) : ?>
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
                <div class="input-group">
                    <input type="text" name="notagihan" class="form-control" placeholder="nomor SPP/SPBy">
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
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Tgl SPM</th>
                            <th>No SP2D</th>
                            <th>Tgl SP2D</th>
                            <th>Jenis Tagihan</th>
                            <th>Unit</th>
                            <th>PPK</th>
                            <th>Jenis Dokumen</th>
                            <th>Bruto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = $page + 1;
                        foreach ($tagihan as $r) : ?>
                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['notagihan']; ?></td>
                                <td><?= tanggal($r['tgltagihan']); ?></td>
                                <td><?= tanggal($r['tglspm']); ?></td>
                                <td><?= $r['nosp2d']; ?></td>
                                <td><?= tanggal($r['tglsp2d']); ?></td>
                                <td><?= $r['jnstagihan'] == 1 ? 'SPP' : 'SPBy'; ?></td>
                                <td><?= $r['nmunit']; ?></td>
                                <td><?= $r['nmppk']; ?></td>
                                <td><?= $r['nmdokumen']; ?></td>
                                <td class="text-right"><?= number_format($r['bruto'], 0, ',', '.'); ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('bendahara/update/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">SP2D</a>
                                        <?php if ($r['kddokumen'] != '04' and $r['kddokumen'] != '05') : ?>
                                            <a href="<?= base_url('bendahara/payroll/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Payroll</a>
                                            <a href="<?= base_url('upload/index/') . $r['id'] . '/bendahara'; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Upload</a>
                                        <?php endif; ?>
                                        <a href="<?= base_url('bendahara/detail/') . $r['id'] . '/a'; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">SSPB</a>
                                        <a href="<?= base_url('bendahara/tolak/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan menolak data ini?');">Tolak</a>
                                        <a href="<?= base_url('bendahara/kirim/') . $r['id']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0" onclick="return confirm('Apakah Anda yakin akan mengirim data ini?');">Kirim</a>
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
            <?= $notagihan == null ? $pagination : ''; ?>
        </div>
    </div>

</main>