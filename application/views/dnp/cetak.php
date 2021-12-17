<style>
    table {
        width: 100%;
        border: 1px solid black;
        border-collapse: collapse;
        padding: 0mm;
        border-spacing: 0px;
        font-size: 11px;
    }

    table.kosong {
        width: 100%;
        border: none;
        border-collapse: collapse;
        padding: 0mm;
        border-spacing: 0px;
        font-size: 11px;
    }

    th {
        border: 1px solid black;
        padding: 1mm;
    }

    td {
        border: 1px solid black;
        padding: 1mm;
    }

    td.kosong {
        border: none;
        padding: 1mm;
    }

    h5 {
        text-align: center;
        font-size: 13px;
        margin-top: 15px;
        margin-bottom: 2px;
        font-weight: 100;
    }

    p {
        text-align: justify;
        line-height: 1.6;
    }
</style>

<page backtop="5mm" backbottom="5mm" backleft="0mm" backright="0mm" footer="date;time">
    <page_header>
        <table class="kosong">
            <tr>
                <td class="kosong" style="width:450px; padding-bottom:0;">KEMENTERIAN KEUANGAN REPUBLIK INDONESIA</td>
                <td class="kosong" style="padding-bottom:0;">Lampiran SPP Nomor <?= $tagihan['notagihan']; ?></td>
            </tr>
            <tr>
                <td class="kosong" style="width:450px; padding-bottom:15px;">DIREKTORAT JENDERAL KEKAYAAN NEGARA</td>
                <td class="kosong" style="padding-bottom:15px;">Tanggal <?= tanggal($tagihan['tgltagihan']); ?></td>
            </tr>
        </table>
        <h5 style="margin-top:0; margin-bottom:10px;">DAFTAR NOMINATIF PEMBAYARAN (DNP)</h5>
        <p style="text-align: center; margin:0; padding:0; font-size: 11px;"><?= $tagihan['uraian']; ?></p>

    </page_header>
    <page_footer>

    </page_footer>
    <table style="margin-top: 110px;">
        <tr>
            <td style="text-align: center; width:3%; padding:0;">No</td>
            <td style="text-align: center; width:28%;">Nama/NIP</td>
            <td style="text-align: center; width:4%; padding:0;">Gol</td>
            <td style="text-align: center; width:15%;">Bruto</td>
            <td style="text-align: center; width:15%;">PPH</td>
            <td style="text-align: center; width:15%;">Netto</td>
            <td style="text-align: center; width:20%;">Rekening</td>
        </tr>
    </table>
    <table>
        <?php $no = 1;
        $j1 = 0;
        $j2 = 0;
        $j3 = 0;
        $j4 = 0;
        foreach ($dnp as $r) : ?>
            <tr>
                <td style="text-align: center; width:3%;"><?= $no++; ?></td>
                <td style="text-align: left; width:28%;"><?= $r['nama']; ?>/ <?= $r['nip']; ?></td>
                <td style="text-align: center; width:4%; padding:0;"><?= $r['kdgol']; ?></td>
                <td style="text-align: right; width:15%;"><?= number_format($r['bruto'], 0, ',', '.'); ?></td>
                <td style="text-align: right; width:15%;"><?= number_format($r['pph'], 0, ',', '.'); ?></td>
                <td style="text-align: right; width:15%;"><?= number_format($r['netto'], 0, ',', '.'); ?></td>
                <td style="text-align: center; width:20%; padding:0;"><?= $r['rekening']; ?> <h5 style="margin-top: 0; font-size: xx-small;"><?= $r['nmbank']; ?></h5>
                </td>
            </tr>
        <?php $j1 += $r['bruto'];
            $j2 += $r['pph'];
            $j3 += $r['netto'];
        endforeach; ?>
        <tr>
            <td style="text-align: center; width:35%;" colspan="3">Jumlah Total</td>
            <td style="text-align: right; width:15%;"><?= number_format($j1, 0, ',', '.'); ?></td>
            <td style="text-align: right; width:15%;"><?= number_format($j2, 0, ',', '.'); ?></td>
            <td style="text-align: right; width:15%;"><?= number_format($j3, 0, ',', '.'); ?></td>
            <td style="text-align: center; width:20%;"></td>
        </tr>
    </table>

    <table class="kosong" style="padding-top:10px;">
        <tr>
            <td class="kosong" style="width:450px; padding-bottom:40px;">Bendahara Pengeluaran</td>
            <td class="kosong" style="padding-bottom:40px;">Pejabat Pembuat Komitmen</td>
        </tr>
        <tr>
            <td class="kosong" style="width:450px; padding-bottom:0;"><?= $tagihan['nmbendahara']; ?></td>
            <td class="kosong" style="padding-bottom:0;"><?= $tagihan['nmppk']; ?></td>
        </tr>
    </table>


</page>