<?php

function btn_aktif($uri)
{
    return anchor($uri, '<button type="button" class="btn btn-default "> &nbsp; Aktifkan &nbsp;</button>');
}

function btn_tidak_aktif($uri)
{
    return anchor($uri, '<button type="button" class="btn btn-default "> &nbsp; Nonaktifkan &nbsp;</button>');
}

function btn_koreksi($uri)
{
    return anchor($uri, 'Koreksi', array(
        'class' => 'btn btn-info'
    ));
}

function btn_pilih($uri, $string = "Pakai Alamat ini")
{
    return anchor($uri, $string, array(
        'class' => 'btn btn-danger'
    ));
}
function btn_koreksi_icon($uri)
{
    return anchor($uri, '<i class="fa fa-edit"></i>', array(
        'class' => 'btn btn-primary btn-sm',
        'data-toggle' => 'tooltip',
        'data-original-title' => 'Kelola Berkas Pasien'
    ));
}

function btn_hapus($uri)
{
    return "<a href=\"javascript:void(0);\" class=\"btn btn-danger\" onclick=\"hapus('" . $uri . "');\" >Hapus</a>";
}
function btn_hapus_icon($uri)
{
    return "<button  href=\"javascript:void(0);\" onclick=\"hapus('" . $uri . "');\" class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" data-original-title=\"Hapus\"><i class=\"fa fa-trash-o\"></i></button>";
}
function btn_hapus_icon_permanent($uri)
{
    return "<button  href=\"javascript:void(0);\" onclick=\"hapus('" . $uri . "');\" class=\"btn btn-danger btn-sm\" data-toggle=\"tooltip\" data-original-title=\"Hapus Permanent\"><i class=\"fa fa-trash-o\"></i></button>";
}
function btn_multi_hapus()
{
    return "<a href=\"javascript:void(0);\" id=\"btn_hapus_multi\" class=\"btn btn-danger margin-bottom btn_hapus_multi\"  ><i class=\"fa\"></i> HAPUS YANG DI TANDAI</a>";
}

// function btn_check_all()
// {
//     return "<a href=\"javascript:void(0);\" id=\"btn_chk_all\" style=\"margin-left:5px\" class=\"btn btn-info margin-bottom checkall\" ><i class=\"fa fa-check\"></i> CHECK ALL
//     ""</a>";

// }


function btn_bersih($uri)
{
    return anchor($uri, '<button class="btn btn-info" ><i class="fa fa-remove"></i> BERSIHKAN</button>', array(
        'onclick' => "return confirm('Anda akan Keluar dari Halaman ini, Jika Anda Membersihkan Seluruh Data ini, Apakah Anda Yakin?');"
    ));
}

function e($string) // htmlentities
{
    return htmlentities($string);
}
// end htmlentities
function up($string) // Upper case all string
{
    return strtoupper($string);
}

function low($string)
{
    return strtolower($string);
}

function clean_str_end($string)
{
    return trim(preg_replace('/\s+/', ' ', $string));
}
function gambar($promo)
{
    $CI = &get_instance();

    if ($CI->uri->segment(2) == 0) {
        $img = $promo['gambar'];
    } else 
        if ($CI->uri->segment(3)) {
        $img = '../.' . $promo['gambar'];
    } else {
        $img = '.' . $promo['gambar'];
    }

    return $img;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    $jam = substr($tgl, 11, 5);
    return $tanggal . ' - ' . $bulan . ' - ' . $tahun . ' ' . $jam . ' WIB';
}
function get_bulan($tgl)
{
    $bulan = getBulan(substr($tgl, 5, 2));
    return $bulan;
}
function get_tahun($tgl)
{
    $tahun = substr($tgl, 0, 4);
    return $tahun;
}
function tgl_no_jam($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    // $jam = substr($tgl, 11, 5);
    return $tanggal . ' - ' . $bulan . ' - ' . $tahun;
}

function tgl_bulan($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    // $tahun = substr($tgl, 0, 4);
    // $jam = substr($tgl, 11, 5);
    return $tanggal . ' - ' . $bulan;
}

function thousandsCurrencyFormat($num)
{

    if ($num > 1000) {

        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'jt', 'm', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];

        return $x_display;
    }

    return $num;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function rand_color()
{
    return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}

function random_color()
{
    mt_srand((float) microtime() * 1000000);
    $c = '';
    while (strlen($c) < 6) {
        $c .= sprintf("%02X", mt_rand(0, 255));
    }
    return $c;
}

// Fungsi Konversi Time Ago dengan parameter waktu posting (date)
function konversiTimeAgo($waktuPosting)
{
    //  timeAgo adalah waktu estimasi kira-kira berapa lama jeda antara hari ini dengan waktu posting
    //  timeAgo = tanggal sekarang - waktu posting
    $timeAgo = time() - $waktuPosting;
    //  jika timeAgo kurang dari 1 detik, maka munculkan pesan 'beberapa saat yang lalu'
    if ($timeAgo < 5000) {
        return '<span class="label label-success">Baru</span>';
    }
    //  kondisi dimana tahun, bulan, hari, jam, menit, dan detik dalam satuan detik
    //  dimasukkan ke dalam sebuah array untuk pembanding
    $condition = array(
        31104000    =>  'tahun',
        2592000     =>  'bulan',
        86400       =>  'hari',
        3600        =>  'jam',
        60          =>  'menit',
        1           =>  'detik'
    );
    //  melakukan perulangan untuk mengecek kondisi mana yang paling sesuai dengan timeAgo
    foreach ($condition as $secs => $str) {
        //  $d adalah nilai satuan yg digunakan seperti '1 tahun' atau '2 jam'
        //  $d didapat dari timeAgo dibagi dengan kondisi
        $d = $timeAgo / $secs;
        // jika $d lebih dari atau sama dengan 1 maka cetak hasil kondisi dan sudahi perulangan
        if ($d >= 1) {
            //  waktu di bulatkan
            $r = round($d);
            return $r . ' ' . $str . ' yang lalu';
        }
    }
}

function set_rights($menus, $menuRights, $topmenu)
{
    $data = array();

    for ($i = 0, $c = count($menus); $i < $c; $i++) {

        $row = array();
        for ($j = 0, $c2 = count($menuRights); $j < $c2; $j++) {
            if ($menuRights[$j]->ac_module_id == $menus[$i]->mod_moduleid) {
                if (authorize($menuRights[$j]->ac_create) || authorize($menuRights[$j]->ac_edit) || authorize($menuRights[$j]->ac_delete) || authorize($menuRights[$j]->ac_view)) {

                    $row["menu"] = $menus[$i]->mod_modulegroupid;
                    $row["menu_name"] = $menus[$i]->mod_modulename;
                    $row["page_name"] = $menus[$i]->mod_modulepagename;
                    $row["ac_create"] = $menuRights[$j]->ac_create;
                    $row["ac_edit"] = $menuRights[$j]->ac_edit;
                    $row["ac_delete"] = $menuRights[$j]->ac_delete;
                    $row["ac_view"] = $menuRights[$j]->ac_view;

                    $data[$menus[$i]->mod_modulegroupid][$menuRights[$j]->ac_module_id] = $row;
                    $data[$menus[$i]->mod_modulegroupid]["top_menu_name"] = $menus[$i]->mod_modulegroupname;
                    $data[$menus[$i]->mod_modulegroupid]["top_icon"] = $menus[$i]->ico;
                }
            }
        }
    }
    // dump($data);
    return $data;
}

// this function is used by set_rights() function
function authorize($module)
{
    return $module == "Y" ? TRUE : FALSE;
}

// this function tabs for cek rate / cek tarif
/*
 * function get_tabs($array, $child = FALSE) // tarik menu catagory
 * {
 *
 * $str = '';
 * if (count($array)) {
 * $str .= $child == FALSE ? ' <ul class="nav nav-tabs" id="jenisLayanan_item">' . PHP_EOL : '<div class="tab-content">' . PHP_EOL;
 * foreach ($array as $count => $itemMen) {
 * $active = $count == 0 ? TRUE : FALSE;
 * if (isset($itemMen->submenu) && count($itemMen->submenu)) {
 * $str .= $active ? '<div class="tab-pane active" id="tab_' . $itemMen->id . '">' : '<div class="tab-pane" id="tab_' . $itemMen->id . '">' . PHP_EOL;
 * $str .= e($itemMen->nama);
 * $str .= '</div>' . PHP_EOL;
 * $str .= get_tabs($itemMen->submenu, TRUE);
 * } else {
 * $str .= $active ? '<li id="tabjenislayananItem" class="active">' : '<li id="tabjenislayananItem">' . PHP_EOL;
 * $str .= '<a href="#tab_' . $itemMen->id . '" aria-controls="tab_' .$itemMen->id . '" role="tab" data-toggle="tab">' . e($itemMen->nama) . '</a>';
 * $str .= '</li>' . PHP_EOL;
 * }
 * }
 * $str .= $child == FALSE ? ' </ul>' . PHP_EOL : '</div>' . PHP_EOL;
 * }
 * return $str;
 * }
 */
/* function get_tabs($tabs) // tarik tabs
{
    $str = '';
    if (count($tabs)) {
        $str .= ' <ul class="nav nav-tabs" id="jenisLayanan_item">';
        foreach ($tabs as $count => $itemTabs) {
            $active = $count == 0 ? TRUE : FALSE;
            $str .= $active ? '<li id="tabjenislayananItem" class="active">' : '<li id="tabjenislayananItem">' . PHP_EOL;
            $str .= '<a href="#tab_' . $itemTabs->idJenis . '" aria-controls="tab_' . $itemTabs->idJenis. '" role="tab" data-toggle="tab">' . e($itemTabs->namaJenis) . '</a>';
            $str .= '</li>' . PHP_EOL;
        }
        $str .= ' </ul>' . PHP_EOL;
        $str .= '<div class="tab-content" id="tabContent_item">';
        foreach ($tabs as $count => $tabPane) {
            $active = $count == 0 ? TRUE : FALSE;
            $str .= $active ? '<div class="tab-pane fade active in " id="tab_' . $tabPane->idJenis . '">' : '<div class="tab-pane fade in" id="tab_' . $tabPane->idJenis . '">' . PHP_EOL;
            $str .= e($tabPane->namaJenis);
            $str .= e($tabPane->namaKlasi);
           // $str .= $getTarif;
            $str .= '</div>' . PHP_EOL;
        }
        $str .= '</div>' . PHP_EOL;
    }
    return $str;
} */

function get_tabContent($table, $finalWcount, $idmemstat)
{

    $str = '';

    $str .= '<table class="table table-striped no-border" id="regularTable">' . PHP_EOL;
    $str .= '<thead> <tr>' . PHP_EOL;
    $str .= '<th>Jenis Layanan</th>' . PHP_EOL;
    $str .= '<th>Durasi</th>' . PHP_EOL;
    $str .= '<th>Harga</th>' . PHP_EOL;
    $str .= '<th>Asuransi</th>' . PHP_EOL;
    $str .= '<th></th></tr></thead>' . PHP_EOL;
    $str .= '<tbody id="regularTBody">' . PHP_EOL;
    if (count($table)) {
        foreach ($table as $count => $itemTabpane) {

            $countHarga = $itemTabpane->berat == '>20' ? $itemTabpane->hargapengiriman * $finalWcount : $itemTabpane->hargapengiriman;
            $countHargaosede = $itemTabpane->berat == '>20' ? $itemTabpane->hargamemberosede * $finalWcount : $itemTabpane->hargamemberosede;
            $hargauses = $idmemstat == "1" ? $countHarga : $countHargaosede;
            $hargamember = $idmemstat == "1" ? e($itemTabpane->currency) . ' <span  class="hargapengiriman" id="hargapengiriman" name="hargapengiriman">' . number_format(e($countHarga), 2, ',', '.') :
                '<strike>' . e($itemTabpane->currency) . ' <span  class="hargapengiriman" id="hargapengiriman" name="hargapengiriman">' . number_format(e($countHarga), 2, ',', '.') . '</strike> - '
                . e($itemTabpane->currency) . ' <span  class="hargapengirimanosede" id="hargapengirimanosede" name="hargapengirimanosede">' . number_format(e($countHargaosede), 2, ',', '.');

            $str .= '<tr>' . PHP_EOL;

            $str .= '<td><h4><label class="label label-primary">' . e($itemTabpane->namaJenis) . '</label></h4>' . PHP_EOL; //nama layananan
            $str .= '<label for="varchar" class="text-green">(GW) : <span  class="actualWmodal" id="actualWmodal" name="actualWmodal">0.1</span> KG</label> - 
				     <label for="varchar" class="text-aqua">(V): <span  class="volumeWmodal" id="volumeWmodal" name="volumeWmodal">0.1</span> KG</label> - 
                    <label for="varchar" class="text-red">(CW) : <span  class="finalWmodal">' . $finalWcount . '</span> KG</label>' . PHP_EOL;
            $str .= '</td>' . PHP_EOL;

            $str .= '<td><label for="varchar" class="text-grey">' . e($itemTabpane->durasipengiriman) . '</label></td>' . PHP_EOL; //estimasi
            $str .= '<td><label for="varchar" class="text-grey">' . $hargamember . '</label></td>' . PHP_EOL;
            $str .= ' <td>0</td>' . PHP_EOL;
            $str .= ' <td><button class="btn btn-sm btn-default" data-dismiss="modal" onclick="setRate(' . "'" . $itemTabpane->idtarifintr . "'" . ',' . "'" . ($hargauses) . "'" . ','
                . "'" . e($itemTabpane->durasipengiriman) . "'" . ',' . "'" . number_format(e($hargauses), 2, ',', '.') . "'" . ',' . "'" . e($itemTabpane->currency) . "'" . ','
                . "'" . e($itemTabpane->namaKlasi) . "'" . ',' . "'" . e($itemTabpane->namaJenis) . "'" . ',' . "'" . e($itemTabpane->idKlasi) . "'" . ',' . "'" . e($itemTabpane->idJenis) . "'" . ')">Select This</button> </td>' . PHP_EOL;
            $str .= ' <td></td>' . PHP_EOL;
            $str .= '</tr>' . PHP_EOL;
        }
    } else {
        $str .= '<tr>' . PHP_EOL;
        $str .= '<td>Layananan Tidak Tersedia</td>' . PHP_EOL;
        $str .= '<td></td>' . PHP_EOL;
        $str .= '<td></td>' . PHP_EOL;
        $str .= '<td></td>' . PHP_EOL;
        $str .= '<td></td>' . PHP_EOL;
        $str .= '</tr>' . PHP_EOL;
    }
    $str .= '  </tbody>' . PHP_EOL;
    $str .= ' </table>' . PHP_EOL;



    return $str;
}
function alert($msg, $echo = TRUE)
{
    // Output
    $output = "<script type='text/javascript'>alert('$msg');</script>";
    if ($echo == TRUE) {
        echo $output;
    } else {
        return $output;
    }
}

/**
 * Dump helper.
 * Functions to dump variables to the screen, in a nicley formatted manner.
 *
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {

    function dump($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        // Output
        if ($echo == TRUE) {
            echo $output;
        } else {
            return $output;
        }
    }
}
if (!function_exists('dump_exit')) {

    function dump_exit($var, $label = 'Dump', $echo = TRUE)
    {
        dump($var, $label, $echo);
        exit();
    }
}

function encrypting($string = "")
{
    $CI = &get_instance();
    return $CI->crypto->encrypt($string);
}

function decrypting($string = "")
{
    $CI = &get_instance();
    return $CI->crypto->decrypt($string);
}
