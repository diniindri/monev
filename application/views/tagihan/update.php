<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Tagihan</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Nomor Tagihan:</label>
                    <input type="text" name="notagihan" class="form-control <?= form_error('notagihan') ? 'is-invalid' : ''; ?>" value="<?= $tagihan['notagihan']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('notagihan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Tanggal Tagihan:</label>
                    <input type="text" name="tgltagihan" class="form-control <?= form_error('tgltagihan') ? 'is-invalid' : ''; ?>" value="<?= $tagihan['tgltagihan']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tgltagihan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis Tagihan:</label>
                    <select class="form-select form-select-sm mb-3" name="jnstagihan">
                        <option value="0" <?= $tagihan['jnstagihan'] == 0 ? 'selected' : ''; ?>>SPBy</option>
                        <option value="1" <?= $tagihan['jnstagihan'] == 1 ? 'selected' : ''; ?>>SPP</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis Tagihan:</label>
                    <select class="form-select form-select-sm mb-3" name="kdunit">
                        <option value="0" <?= $tagihan['kdunit'] == 0 ? 'selected' : ''; ?>>SPBy</option>
                        <option value="1" <?= $tagihan['kdunit'] == 1 ? 'selected' : ''; ?>>SPP</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis Tagihan:</label>
                    <select class="form-select form-select-sm mb-3" name="kddokumen">
                        <option value="0" <?= $tagihan['kddokumen'] == 0 ? 'selected' : ''; ?>>SPBy</option>
                        <option value="1" <?= $tagihan['kddokumen'] == 1 ? 'selected' : ''; ?>>SPP</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('tagihan'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>