<?php

defined('BASEPATH') or exit('No direct script access allowed');

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nip')) {
        redirect('welcome');
    }
}

function base_uri()
{
    $base_uri = 'https://alika.kemenkeu.go.id/api/';
    // $base_uri = 'http://localhost:8888/x-alika/api/';
    return $base_uri;
}

function auth()
{
    $auth = ['superalika', 'Hkkg456*#@ghj@#jkkknb4578HrtgJgffg875hfg&kjkh*hgf*gff@fghjjYbbh654g6sh6sj8253nsg6j*hnb#'];
    return $auth;
}

function apiKey()
{
    return 'hGfdg456ghD4f566afjh6Fg@hgb#jijk';
}

function tanggal($tgl)
{
    $bulan = date('m', $tgl);
    $daftar_bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
    $nama_bulan = $daftar_bulan[$bulan];

    return $tgl == null ? '' : date('d', $tgl) . ' ' . $nama_bulan . ' ' . date('Y', $tgl);
}

function sesi()
{
    $ci = get_instance();
    return [
        'tahun' => $ci->session->userdata('tahun'),
        'kdsatker' => $ci->session->userdata('kdsatker'),
        'kdppk' => $ci->session->userdata('kdppk'),
    ];
}

function nomor()
{
    $ci = get_instance();
    $nomor = $ci->nomor->getNoReg()['nomor'];
    $ekstensi = $ci->nomor->getNoreg()['ekstensi'];
    $next = intval($nomor) + 1;
    switch (strlen($next)) {
        case '1':
            $next = '000' . $next;
            break;
        case '2':
            $next = '00' . $next;
            break;
        case '3':
            $next = '0' . $next;
            break;
        default:
            $next = $next;
            break;
    }
    return [
        'nomor' => $nomor,
        'ekstensi' => $ekstensi,
        'next' => $next
    ];
}
