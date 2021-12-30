<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Realisasi Per Direktorat</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-7">
            <a href="<?= base_url('realisasi-direktorat/index/1'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2 <?= $jenis == 1 ? 'active' : ''; ?>">Per Tagihan</a>
            <a href="<?= base_url('realisasi-direktorat/index/2'); ?>" class="btn btn-sm btn-outline-secondary mt-1 mb-1 ml-2 <?= $jenis == 2 ? 'active' : ''; ?>">Per SP2D</a>
        </div>
        <div class="col-lg-5">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="text-center">
                        <tr class="align-middle">
                            <th>Nomor</th>
                            <th>Unit</th>
                            <th>Pagu</th>
                            <th>Realisasi</th>
                            <th>Sisa Pagu</th>
                            <th>Persentase</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no = 1;
                        foreach ($unit as $r) : ?>

                            <tr>
                                <td class="text-center"><?= $no++; ?></td>
                                <td><?= $r['nmunit']; ?></td>
                                <td class="text-right"><?= number_format($r['pagu'], 0, ',', '.'); ?></td>
                                <td class="text-right"><?= number_format($r['realisasi'], 0, ',', '.'); ?></td>
                                <td class="text-right"><?= number_format($r['sisa'], 0, ',', '.'); ?></td>
                                <td class="text-center"><?= number_format($r['realisasi'] / $r['pagu'] * 100, 2, ',', '.') . '%'; ?></td>
                                <td class="pb-0">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= base_url('realisasi-direktorat/detail/') . $jenis . '/' . $r['kdunit']; ?>" class="btn btn-sm btn-outline-secondary pt-0 pb-0">Detail</a>
                                    </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>