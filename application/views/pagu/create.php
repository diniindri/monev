<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Pagu</h1>
    </div>

    <form action="" method="post" autocomplete="off">
        <!-- <?= form_open(); ?> -->

        <div class="row">
            <div class="col-lg-3">
                <div class="form-group mb-2">
                    <label for="">Program:</label>
                    <input type="text" name="program" class="form-control <?= form_error('program') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('program'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Kegiatan:</label>
                    <input type="text" name="kegiatan" class="form-control <?= form_error('kegiatan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kegiatan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">KRO:</label>
                    <input type="text" name="kro" class="form-control <?= form_error('kro') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kro'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">RO:</label>
                    <input type="text" name="ro" class="form-control <?= form_error('ro') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('ro'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Komponen:</label>
                    <input type="text" name="komponen" class="form-control <?= form_error('komponen') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('komponen'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Subkomponen:</label>
                    <input type="text" name="subkomponen" class="form-control <?= form_error('subkomponen') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('subkomponen'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Akun:</label>
                    <input type="text" name="akun" class="form-control <?= form_error('akun') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('akun'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Anggaran:</label>
                    <input type="text" name="anggaran" class="form-control <?= form_error('anggaran') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('anggaran'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Kode Unit:</label>
                    <input type="text" name="kdunit" class="form-control <?= form_error('kdunit') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdunit'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Kode PPK:</label>
                    <input type="text" name="kdppk" class="form-control <?= form_error('kdppk') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('kdppk'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('pagu'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>