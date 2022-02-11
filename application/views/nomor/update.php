<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Nomor Register</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Nomor Register:</label>
                    <input type="text" name="nomor" class="form-control <?= form_error('nomor') ? 'is-invalid' : ''; ?>" value="<?= $nomor['nomor']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nomor'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Ekstensi:</label>
                    <input type="text" name="ekstensi" class="form-control <?= form_error('ekstensi') ? 'is-invalid' : ''; ?>" value="<?= $nomor['ekstensi']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ekstensi'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Tahun:</label>
                    <input type="text" name="tahun" class="form-control <?= form_error('tahun') ? 'is-invalid' : ''; ?>" value="<?= $nomor['tahun']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tahun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Kode Satker:</label>
                    <input type="text" name="kdsatker" class="form-control <?= form_error('kdsatker') ? 'is-invalid' : ''; ?>" value="<?= $nomor['kdsatker']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdsatker'); ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <a href="<?= base_url('nomor'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                    </div>
                </div>
            </div>

    </form>

</main>