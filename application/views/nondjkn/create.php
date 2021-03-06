<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pegawai Non DJKN</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">NIP/NIK/NPWP:</label>
                    <input type="text" name="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nip'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama Pegawai:</label>
                    <input type="text" name="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nama'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Kode Golongan:</label>
                    <input type="text" name="kdgol" class="form-control <?= form_error('kdgol') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdgol'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nomor Rekening:</label>
                    <input type="text" name="rekening" class="form-control <?= form_error('rekening') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('rekening'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama Bank:</label>
                    <input type="text" name="nmbank" class="form-control <?= form_error('nmbank') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmbank'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Nama Rekening:</label>
                    <input type="text" name="nmrek" class="form-control <?= form_error('nmrek') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmrek'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('nondjkn'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>