<style type="text/css">
    table.page_header {
        width: 100%;
        border: none;
        padding: 0mm;
        border-spacing: 0px;
        margin-top: 5px;
        margin-left: 20px;
        align-content: center;
        align-items: center;
        align-self: center;
        box-align: center;
        text-align: center;
    }

    table.page_header_garis {
        width: 100%;
        border: none;
        border-bottom: solid 1mm #77797a;
        padding: 0mm;
        border-spacing: 0px;
        margin-top: 5px;
        margin-left: 20px;
    }

    table.page_footer {
        width: 100%;
        border: none;
        padding: 0mm;
        font-size: 7px;
    }

    td.logo {
        text-align: center;
    }

    td.kop1 {
        text-align: center;
        font-size: 17px;
        width: 80%;
    }

    td.kop2 {
        text-align: center;
        font-size: 15px;
    }

    td.kop3 {
        text-align: center;
        font-size: 9px;
        line-height: 7px;
        margin-right: 100px;
    }

    td.garis {
        width: 95%;
        text-align: center;
        font-size: 9px;
        line-height: 7px;
    }

    #judul1 {
        text-align: center;
        font-size: 15px;
    }

    #judul2 {
        text-align: center;
        font-size: 13px;
    }

    #judul3 {
        text-align: left;
        font-size: 13px;
    }

    table.page {
        width: 100%;
        border: 1px;
        padding: 1mm;
        font-size: 13px;
    }

    table.detail {
        width: 100%;
        padding: 0mm;
        font-size: 13px;
        border-collapse: collapse;
        border: 1px solid black;
    }

    td.data {
        border: 1px solid black;
        font-size: 11px;
    }

    td.angka {
        border: 1px solid black;
        text-align: right;
        padding-right: 5px;
        font-size: 11px;
    }

    td.head {
        border: 1px solid black;
        font-size: 12px;
    }

    td.headangka {
        border: 1px solid black;
        text-align: right;
        padding-right: 5px;
        font-size: 13px;
    }

    table.detail {
        width: 100%;
        padding: 0mm;
        font-size: 13px;
        border-collapse: collapse;
        border: 1px solid black;
    }
</style>

<page backtop="40mm" backbottom="0mm" backleft="5mm" backright="5mm">

    <page_header>
        <table class="page_header" cellspacing="0px" cellpadding="0px">
            <tr>
                <td class="logo" rowspan="10">
                    <img src="<?= FCPATH . 'assets/img/logo.jpeg'; ?>" alt="logo kemenkeu" width="100">
                </td>
                <td class="kop1">
                    <b>KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</b>
                </td>
            </tr>
            <tr>
                <td class="kop2">
                    <b>DIREKTORAT JENDERAL KEKAYAAN NEGARA</b>
                </td>
            </tr>
            <tr>
                <td class="kop2" style="line-height:1px;">
                    <b><?= $satker['header1']; ?></b>
                </td>
            </tr>
            <tr>
                <td class="kop2">
                    <b><?= $satker['header2']; ?></b><br><br>
                </td>
            </tr>
            <tr>
                <td class="kop3">
                    <?= $satker['subheader1']; ?>
                </td>
            </tr>
            <tr>
                <td class="kop3">
                    <?= $satker['subheader2']; ?>
                </td>
            </tr>
            <tr>
                <td class="kop3">
                    <?= $satker['subheader3']; ?>
                </td>
            </tr>
            <tr>
                <td class="kop3">
                </td>
            </tr>
            <tr>
                <td class="kop3">
                </td>
            </tr>
        </table>
        <table class="page_header_garis" cellspacing="0px" cellpadding="0px">
            <tr>
                <td class="garis"></td>
            </tr>
        </table>
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td class="logo" rowspan="10" style="padding-left: 30px;">
                    <img src="<?= FCPATH . 'assets/img/esign.png'; ?>" alt="logo bssn" width="20">
                </td>
            </tr>
        </table>
    </page_footer>

    <div id="judul1" style="margin-top: 10px;">
        <strong>REGISTER TAGIHAN</strong><br>
        <span style="font-size: 12px; margin-top: 5px;"><?= 'No: ' . $register['nomor'] . $register['ekstensi'] . '  Tgl: ' . tanggal($register['tanggal']); ?></span>
    </div>

    <p style="margin-left:10px; margin-bottom: 5px; margin-top:15px; text-align: justify;">Saya yang bertandatangan dibawah ini, menyampaikan daftar tagihan sebagai berikut:</p>

    <table class="detail" style="width: 100%; margin-left:3px; margin-bottom:15px;">
        <tr style="text-align: center;">
            <td class="head" style="width: 4%;">No.</td>
            <td class="head" style="width: 10%;">Nomor Tagihan</td>
            <td class="head" style="width: 15%;">Tanggal</td>
            <td class="head" style="width: 31%;">Uraian</td>
            <td class="head" style="width: 10%;">Jenis Tagihan</td>
            <td class="head" style="width: 10%;">Unit</td>
            <td class="head" style="width: 10%;">Jenis Dokumen</td>
            <td class="head" style="width: 10%;">Bruto</td>
        </tr>
        <?php $no = 1;
        $jbruto = 0;
        foreach ($tagihan as $r) : ?>
            <tr>
                <td class="head" style="text-align: center;width: 4%;"><?= $no++; ?></td>
                <td class="head" style="text-align: center;width: 10%;"><?= $r['notagihan']; ?></td>
                <td class="head" style="width: 15%;"><?= tanggal($r['tgltagihan']); ?></td>
                <td class="head" style="width: 31%;"><?= $r['uraian']; ?></td>
                <td class="head" style="text-align: center;width: 10%;"><?= $r['jnstagihan'] == 1 ? 'SPP' : 'SPBy'; ?></td>
                <td class="head" style="text-align: center;width: 10%;"><?= $r['nmunit']; ?></td>
                <td class="head" style="width: 10%;"><?= $r['nmdokumen']; ?></td>
                <td class="head" style="text-align: right;width: 10%;"><?= number_format($r['bruto'], 0, ',', '.'); ?></td>
            </tr>
        <?php
            $jbruto += $r['bruto'];
        endforeach; ?>
        <tr>
            <td class="head" style="text-align: center;width: 10%;" colspan="7">Jumlah</td>
            <td class="head" style="text-align: right;width: 10%;"><?= number_format($jbruto, 0, ',', '.'); ?></td>
        </tr>
    </table>

    <table style="width: 100%; margin-bottom:0;">
        <tr>
            <td style="width: 65%;"></td>
            <td style="width: 35%; text-align: left; margin-top:0; padding-top:0;"><img src="<?= $uri; ?>" alt=""></td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 65%;"></td>
            <td style="width: 35%; color: RGB(153, 153, 153); margin-top:0; padding-top:0;">Ditandatangani secara elektronik</td>
        </tr>
        <tr>
            <td style="width: 65%;"></td>
            <td style="width: 35%;"><?= $ppk['nmppk']; ?></td>
        </tr>
    </table>

</page>