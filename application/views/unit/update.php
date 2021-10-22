<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Unit</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Kode unit:</label>
                    <input type="text" name="kdunit" class="form-control <?= form_error('kdunit') ? 'is-invalid' : ''; ?>" value="<?= $unit['kdunit']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdunit'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama unit:</label>
                    <input type="text" name="nmunit" class="form-control <?= form_error('nmunit') ? 'is-invalid' : ''; ?>" value="<?= $unit['nmunit']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmunit'); ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <a href="<?= base_url('unit'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                    </div>
                </div>
            </div>

    </form>

</main>