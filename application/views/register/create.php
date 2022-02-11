<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Register Tagihan</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Nomor register:</label>
                    <input type="text" name="nomor" class="form-control <?= form_error('nomor') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nomor'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">tanggal:</label>
                    <input type="text" name="tanggal" class="form-control <?= form_error('tanggal') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('tanggal'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jumlah:</label>
                    <input type="text" name="jumlah" class="form-control <?= form_error('jumlah') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('jumlah'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Status:</label>
                    <input type="text" name="status" class="form-control <?= form_error('status') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('status'); ?>
                    </div>
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