<?php

class Dashboard extends Admin_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //   $idrules = "1";
        $id = $this->session->userdata('iduser');
        //   $this->data['rules'] = $this->Rulepickup_m->get($idrules);
        //   count($this->data['rules']) || $this->show_404();
        //   $this->data['internationals'] = $this->International_m->get_with_join();
        //   $this->data['getUnprocess'] = $this->International_m->getUncprocess('1');
        //   $this->data['getPending'] = $this->International_m->getUncprocess('3');
        //   $this->data['getPickup'] = $this->International_m->getUncprocess('2');
        //dump($this->data['getPickup']);

        //dump( $this->data['rules']);
        $this->data['year'] = $this->Direktori_m->get_dropdown_tahun();
        //   dump($this->data['year']);

        if ($id) {

            $this->data['user'] = $this->Settuser_m->get($id);
            count($this->data['user']) || $this->show_404();
        } else {
            count($this->data['user']) || $this->show_404();
        }
        $this->data['subview'] = 'backoffice/dashboard/index';
        $this->load->view('backoffice/_layout_main', $this->data);
    }

    public function grafikbatang()
    {
        // $c1= array(array('1',55)); FORMAT ARRAY PHP UNTUK CONVER KE ARRAY JSON DIAGRAM BATANG HIGHCHART
        $thn = $this->input->post('thn');
        // $thn || $thn = encrypting(date('Y'));

        $year =  $this->Direktori_m->get_dropdown_tahun();
        $years = array_diff($year, ["Tahun"]);
        if (!$thn) {
            for ($i = intval(min($years)); $i <= intval(max($years)); $i++) {
                $arr_directory = array();
                $arr_pasien = array();
                $this->db->join('t_directory', 't_pasien.iddirectory = t_directory.id', 'left');
                $query = $this->Pasien_m->get_by(array(
                    'YEAR(t_directory.tgldirectory)' => $i,
                    't_pasien.jeniskelamin' => 'P'
                ));
                $this->db->join('t_directory', 't_pasien.iddirectory = t_directory.id', 'left');
                $query2 = $this->Pasien_m->get_by(array(
                    'YEAR(t_directory.tgldirectory)' => $i,
                    't_pasien.jeniskelamin' => 'L'
                ));
                $arr_directory[] = $i;
                $arr_directory[] = count($query);
                $directory[] = $arr_directory;
                $arr_pasien[] = $i;
                $arr_pasien[] = count($query2);
                $pasien[] = $arr_pasien;
            }
        } else {

            for ($i = 1; $i <= 12; $i++) {
                $arr_directory = array();
                $arr_pasien = array();
                $bln = $i;
                $this->db->join('t_directory', 't_pasien.iddirectory = t_directory.id', 'left');
                $query = $this->Pasien_m->get_by(array(
                    'MONTH(t_directory.tgldirectory)' => $bln,
                    'YEAR(t_directory.tgldirectory)' => decrypting($thn),
                    't_pasien.jeniskelamin' => 'P'
                ));
                $this->db->join('t_directory', 't_pasien.iddirectory = t_directory.id', 'left');
                $query2 = $this->Pasien_m->get_by(array(
                    'MONTH(t_directory.tgldirectory)' => $bln,
                    'YEAR(t_directory.tgldirectory)' => decrypting($thn),
                    't_pasien.jeniskelamin' => 'L'
                ));
                $arr_directory[] = getBulan($bln);
                $arr_directory[] = count($query);
                $directory[] = $arr_directory;

                $arr_pasien[] = getBulan($bln);
                $arr_pasien[] = count($query2);
                $pasien[] = $arr_pasien;
            }
        }
        $this->data['directory']  = json_encode($directory);
        $this->data['pasien']  = json_encode($pasien);
        $this->load->view('backoffice/dashboard/grafikbatang', $this->data);
    }

    public function grafikpie()
    {
        $thn = $this->input->post('thn');
        $year =  $this->Direktori_m->get_dropdown_tahun();
        $years = array_diff($year, ["Tahun"]);
        // $thn || $thn = encrypting(date('Y'));
        if (!$thn) {
            $this->db->group_by('YEAR(t_directory.tgldirectory)');
            $querys = $this->Direktori_m->get();
            // Jika catagorie Tidak 0 Tampilkan Judul
            $arr = array();
            $collection = [];
            if (count($querys)) {

                foreach ($querys as $query) :
                    $q_pasien = $this->Pasien_m->get_by(array(
                        'YEAR(tgl_directory)' => get_tahun($query->tgldirectory),
                    ));
                    // $arr[$query->id.':'.$query->an_id] = $query->an_name;
                    $arr[str_replace('""', '', "label")] = get_tahun($query->tgldirectory);
                    $arr[str_replace('""', '', "value")] = count($q_pasien);
                    array_push($collection, $arr);

                    $color[] = rand_color();
                endforeach;
            }
        } else {
            $this->db->group_by('MONTH(t_directory.tgldirectory)');
            $querys = $this->Direktori_m->get_by(array(
                'YEAR(t_directory.tgldirectory)' => decrypting($thn),
            ));
            // Jika catagorie Tidak 0 Tampilkan Judul
            $arr = array();
            $collection = [];
            if (count($querys)) {

                foreach ($querys as $query) :
                    $q_pasien = $this->Pasien_m->get_by(array(
                        'iddirectory' => $query->id,
                    ));
                    // $arr[$query->id.':'.$query->an_id] = $query->an_name;
                    $arr[str_replace('""', '', "label")] = get_bulan($query->tgldirectory);
                    $arr[str_replace('""', '', "value")] = count($q_pasien);
                    array_push($collection, $arr);

                    $color[] = rand_color();
                endforeach;
            }
        }
        $colorData = $color;
        // $c1= array(array('1',55)); FORMAT ARRAY PHP UNTUK CONVER KE ARRAY JSON DIAGRAM BATANG HIGHCHART
        // dump(implode(',',$color));
        //dump(json_encode($collection));
        $this->data['color'] = json_encode($colorData);
        $this->data['data'] = json_encode($collection);
        $this->load->view('backoffice/dashboard/grafikpie', $this->data);
    }
}
