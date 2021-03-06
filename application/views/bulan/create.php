<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Bulan</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Kode Bulan:</label>
                    <input type="text" name="kdbulan" class="form-control <?= form_error('kdbulan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdbulan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama Bulan:</label>
                    <input type="text" name="nmbulan" class="form-control <?= form_error('nmbulan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmbulan'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('bulan'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>