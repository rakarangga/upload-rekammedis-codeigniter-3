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
        $now = date('Y-m-d');
        $this->data['year'] = $this->Direktori_m->get_dropdown_tahun();
        if ($id) {
            $this->data['user'] = $this->Settuser_m->get($id);
            $this->data['opt'] = $this->Settuser_m->get_by(array('u_an_id' => 'opt'));
            $this->data['pasien'] = json_encode($this->Pasien_m->get_by(array('stts' => 1)));
            $this->data['today_pasien'] = json_encode($this->Pasien_m->get_by(array('DATE(created)' => $now, 'stts' => 1)));
            $this->data['yesteday_pasien'] = json_encode($this->Pasien_m->get_by('stts = 1 AND (DATE(created) BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())'));
            $this->data['draft'] = json_encode($this->Pasien_m->get_by('stts = 1 AND  id NOT IN (' . implode(',', $this->Pasien_m->getWhereIn()) . ')'));
            //    dump( $this->data['draft']);
            count($this->data['user']) || $this->show_404();
        } else {
            // dump($this->Session->all_userdata());
            count($this->data['user']) || $this->show_404();
        }
      
        $this->data['subview'] = 'backoffice/dashboard/index';
        $this->load->view('backoffice/_layout_main', $this->data);
    }

    public function top_div()
    {
        session_write_close();
        ignore_user_abort(false);
        set_time_limit(0);
        $now = date('Y-m-d');
        try {
            // main loop
            while (true) {
                $pasien = $this->Pasien_m->get_by(array('stts' => 1));
                // where does the data come from ? In real world this would be a SQL query or something
                $data_source = $pasien;
                // if ajax request has send a timestamp, then $last_ajax_pasien = timestamp, else $last_ajax_pasien = null
                $last_ajax_pasien = isset($_GET['countpasien'])  ? (int) $_GET['countpasien'] : null;
                // get count of when file has been changed the last time
                $last_change_pasien = count($data_source);

                // if no count delivered via ajax or database has been changed SINCE last ajax count
                if ($last_ajax_pasien === 0 || $last_change_pasien != $last_ajax_pasien) {
                    // put database's content and count of last database change into array
                    $result = array(
                        'status' => true,
                        'data' => 'pasien',
                        'count_pasien' => intval($last_change_pasien)
                    );
                    // encode to JSON, render the result (for AJAX)
                    $json = json_encode($result);
                    echo $json;
                    exit;
                }

                // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
                sleep(2);
                // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
                clearstatcache();
            }
        } catch (Exception $e) {
            exit(json_encode(
                array(
                    'status' => false,
                    'error' => $e->getMessage()
                )
            ));
        }
    }

    public function top_div2()
    {
        session_write_close();
        ignore_user_abort(false);
        set_time_limit(0);
        $now = date('Y-m-d');
        try {

            // main loop
            while (true) {

                $data_source = $this->Pasien_m->get_sum('stts', array('DATE(created)' => $now, 'stts' => 1));
                $last_change_today = intval($data_source);
                $last_ajax_today = isset($_GET['counttoday'])  ? (int) $_GET['counttoday'] : null;
                if ($last_ajax_today === 0 || $last_change_today != $last_ajax_today) {
                    // put database's content and count of last database change into array
                    $result = array(
                        'status' => true,
                        'data' => 'today',
                        'count_today' => intval($last_change_today)
                    );
                    // encode to JSON, render the result (for AJAX)
                    $json = json_encode($result);
                    echo $json;
                    exit;
                }
                // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
                sleep(2);
                // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
                clearstatcache();
            }
        } catch (Exception $e) {
            exit(json_encode(
                array(
                    'status' => false,
                    'error' => $e->getMessage()
                )
            ));
        }
    }

    public function top_div3()
    {
        session_write_close();
        ignore_user_abort(false);
        set_time_limit(0);
        $now = date('Y-m-d');
        try {

            // main loop
            while (true) {

                $data_source = $this->Pasien_m->get_sum('stts','stts = 1 AND (created BETWEEN DATE_ADD(CURDATE(), INTERVAL -1 day) AND CURDATE())');
                $last_change_yesterday = intval($data_source);
                $last_ajax_yesterday = isset($_GET['countyesterday'])  ? (int) $_GET['countyesterday'] : null;
                if ($last_ajax_yesterday === 0 || $last_change_yesterday != $last_ajax_yesterday) {
                    // put database's content and count of last database change into array
                    $result = array(
                        'status' => true,
                        'data' => 'yesterday',
                        'count_yesterday' => intval($last_change_yesterday)
                    );
                    // encode to JSON, render the result (for AJAX)
                    $json = json_encode($result);
                    echo $json;
                    exit;
                }
                // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
                sleep(2);
                // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
                clearstatcache();
            }
        } catch (Exception $e) {
            exit(json_encode(
                array(
                    'status' => false,
                    'error' => $e->getMessage()
                )
            ));
        }
    }
    public function top_div4()
    {
        session_write_close();
        ignore_user_abort(false);
        set_time_limit(0);
        $now = date('Y-m-d');
        try {

            // main loop
            while (true) {
                $data_source = $this->Pasien_m->get_sum('stts', 'stts = 1 AND  id NOT IN (' . implode(',', $this->Pasien_m->getWhereIn()) . ')');
                $last_ajax_draft = isset($_GET['countdraft'])  ? (int) $_GET['countdraft'] : null;
                $last_change_draft =intval($data_source);

                if ($last_ajax_draft === 0 || $last_change_draft != $last_ajax_draft) {
                    // put database's content and count of last database change into array
                    $result = array(
                        'status' => true,
                        'data' => 'draft',
                        'count_draft' => intval($last_change_draft)
                    );
                    // encode to JSON, render the result (for AJAX)
                    $json = json_encode($result);
                    echo $json;
                    exit;
                }
                // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
                sleep(2);
                // PHP caches file data, like requesting the size of a file, by default. clearstatcache() clears that cache
                clearstatcache();
            }
        } catch (Exception $e) {
            exit(json_encode(
                array(
                    'status' => false,
                    'error' => $e->getMessage()
                )
            ));
        }
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
