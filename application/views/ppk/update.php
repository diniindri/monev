<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah PPK</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Kode PPK:</label>
                    <input type="text" name="kdppk" class="form-control <?= form_error('kdppk') ? 'is-invalid' : ''; ?>" value="<?= $ppk['kdppk']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdppk'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama PPK:</label>
                    <input type="text" name="nmppk" class="form-control <?= form_error('nmppk') ? 'is-invalid' : ''; ?>" value="<?= $ppk['nmppk']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmppk'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">NIP:</label>
                    <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>" value="<?= $ppk['nip']; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip'); ?>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <div class="form-group">
                        <a href="<?= base_url('ppk'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                        <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                    </div>
                </div>
            </div>

    </form>

</main>