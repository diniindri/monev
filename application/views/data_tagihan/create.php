<main class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Tagihan</h1>
    </div>

    <form action="" method="post" autocomplete="off">

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Jenis Tagihan:</label>
                    <select class="form-select form-select-sm mb-3" name="jenis tagihan">
                        <option value="0">SPP</option>
                        <option value="1">SPBy</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">PPK:</label>
                    <select class="form-select form-select-sm mb-3" name="jenis tagihan">
                        <option value="1">Wielly Prasekti</option>
                        <option value="2">Nandang Supriyadi</option>
                        <option value="3">Eny Susanti</option>
                        <option value="4">Anwar Sulaiman</option>
                        <option value="5">Yazuardi Haban</option>
                        <option value="6">Abdul Ghofar</option>
                        <option value="7">Jundi Widiantoro</option>
                        <option value="8">Iwan Darma</option>
                        <option value="9">Mufid Hamdani</option>
                        <option value="10">Lilik Hermawan</option>
                        <option value="11">Bagus Kurniawan</option>
                        <option value="12">Kiki Nurman</option>
                        <option value="13">Moh. Arif Rochman</option>
                        <option value="14">R. Hariyadi Murti Kurniawan</option>
                        <option value="15">Eko Hardiyanto</option>
                        <option value="16">Wahyu Setiadi</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Direktorat/Bagian:</label>
                    <select class="form-select form-select-sm mb-3" name="jenis tagihan">
                        <option value="1">BMN</option>
                        <option value="2">KND</option>
                        <option value="3">HUHU</option>
                        <option value="4">PKNSI</option>
                        <option value="5">Lelang</option>
                        <option value="6">Penilaian</option>
                        <option value="7">PNKNL</option>
                        <option value="8">Keuangan</option>
                        <option value="9">Kepegawaian</option>
                        <option value="10">OKI</option>
                        <option value="11">Perlengkapan</option>
                        <option value="12">Umum</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jenis Dokumen:</label>
                    <select class="form-select form-select-sm mb-3" name="jenis tagihan">
                        <option value="1">Perjadin</option>
                        <option value="2">Honor</option>
                        <option value="3">Biaya Pulsa</option>
                        <option value="4">Kontraktual</option>
                        <option value="5">Non Kontraktual</option>
                        <option value="6">PPNPN</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="">Detail Akun:</label>
                    <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmpeg'); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group mb-2">
                    <label for="">Nomor Tagihan:</label>
                    <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmpeg'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">tanggal Tagihan:</label>
                    <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmpeg'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Jumlah Tagihan:</label>
                    <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmpeg'); ?>
                    </div>
                </div>
                <div class="form-group mb-2">
                    <label for="">Uraian:</label>
                    <input type="text" name="nmpeg" class="form-control <?= form_error('nmpeg') ? 'is-invalid' : ''; ?>">
                    <div class="invalid-feedback">
                        <?= form_error('nmpeg'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="form-group">
                    <a href="<?= base_url('sk-mutasi'); ?>" class="btn btn-sm btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-sm btn-outline-secondary ml-1">Simpan</button>
                </div>
            </div>
        </div>

    </form>

</main>