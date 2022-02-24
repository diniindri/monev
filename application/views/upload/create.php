<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah</h1>
    </div>

    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Jenis Berkas:</label>
                    <select class="form-select form-select-sm mb-3" name="kdberkas">
                        <?php foreach ($berkas as $r) : ?>
                            <option value="<?= $r['kdberkas']; ?>"><?= $r['nmberkas']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Keterangan Dokumen:</label>
                    <input type="text" name="keterangan" class="form-control <?= form_error('keterangan') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('keterangan'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Pilih File: (file PDF dan ukuran maksimal 10MB)</label>
                    <input type="file" name="file" class="form-control <?= form_error('file') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('file'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('upload/index/') . $tagihan_id . '/' . $asal; ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>