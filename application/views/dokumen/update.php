<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Jenis Dokumen</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Kode Dokumen:</label>
                    <input type="text" name="kddokumen" class="form-control <?= form_error('kddokumen') ? 'is-invalid' : ''; ?>" value="<?= $dokumen['kddokumen']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kddokumen'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama dokumen:</label>
                    <input type="text" name="nmdokumen" class="form-control <?= form_error('nmdokumen') ? 'is-invalid' : ''; ?>" value="<?= $dokumen['nmdokumen']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmdokumen'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Status:</label>
                    <select class="form-select form-select-sm mb-3" name="status">
                        <option value="0" <?= $dokumen['status'] == 0 ? 'selected' : ''; ?>>Non DNP</option>
                        <option value="1" <?= $dokumen['status'] == 1 ? 'selected' : ''; ?>>DNP</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <a href="<?= base_url('dokumen'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                    </div>
                </div>
            </div>

    </form>

</main>