<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pejabat</h1>
    </div>

    <!-- <form action="" method="post" autocomplete="off"> -->
    <?= form_open(); ?>

    <div class="row">
        <div class="col-lg-3">
            <div class="form-group mb-2">
                <label for="">Nama Bendahara:</label>
                <input type="text" name="nmbendahara" class="form-control <?= form_error('nmbendahara') ? 'is-invalid' : ''; ?>">
                <div class="invalid-feedback">
                    <?= form_error('nmbendahara'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="form-group">
                <a href="<?= base_url('pejabat'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
            </div>
        </div>
    </div>

    </form>

</main>