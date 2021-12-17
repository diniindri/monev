<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Tagihan</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Nomor Tagihan:</label>
                    <input type="text" name="notagihan" class="form-control <?= form_error('notagihan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('notagihan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Tanggal Tagihan:</label>
                    <input type="text" name="tgltagihan" id="myFlat" class="form-control <?= form_error('tgltagihan') ? 'is-invalid' : ''; ?>" placeholder="dd-mm-yyyy">
                    <div class="invalid-feedback">
                        <?= form_error('tgltagihan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis tagihan:</label>
                    <select class="form-select form-select-sm mb-3" name="jnstagihan">
                        <option value="0">SPBy</option>
                        <option value="1">SPP</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Unit:</label>
                    <select class="form-select form-select-sm mb-3" name="kdunit">
                        <?php foreach ($unit as $r) : ?>
                            <option value="<?= $r['kdunit']; ?>"><?= $r['nmunit']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis Dokumen:</label>
                    <select class="form-select form-select-sm mb-3" name="kddokumen">
                        <?php foreach ($dokumen as $r) : ?>
                            <option value="<?= $r['kddokumen']; ?>"><?= $r['nmdokumen']; ?></option>
                        <?php endforeach; ?>
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