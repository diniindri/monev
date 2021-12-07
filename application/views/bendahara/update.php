<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SP2D</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Tanggal SP2D:</label>
                    <input type="text" name="tglsp2d" class="form-control <?= form_error('tglsp2d') ? 'is-invalid' : ''; ?>" value="<?= $tagihan['tglsp2d'] == null ? '' : date('d-m-Y', $tagihan['tglsp2d']); ?>" placeholder="dd-mm-yyyy">
                    <div class="invalid-feedback">
                        <?= form_error('tglsp2d'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nomor SP2D:</label>
                    <input type="text" name="nosp2d" class="form-control <?= form_error('nosp2d') ? 'is-invalid' : ''; ?>" value="<?= $tagihan['nosp2d']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nosp2d'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('bendahara'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>