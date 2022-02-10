<?php

class C_autentikasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('M_makanan');
    }

    public function register()
    {
        $this->load->view('auth/register');
    }
    public function registerUser()
    {
        $this->load->library('form_validation');
        $this->load->library('session');

        // $this->form_validation->set_rules('password', 'KK', 'required|exact_length[16]');
        $this->form_validation->set_rules(
            'password',
            'required|min_length[6]|max_length[100]',
            'repass',
            'matches[password]',
            array(
                'min_length' => 'password kurang dari 6',
                'max_length' => 'password lebih dari 100',
                'matches' => "password beda"
            )
        );
        // if ($this->form_validation->run() == TRUE) {
        $id_pasien = $this->input->post('id_pasien');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $berat_badan = $this->input->post('berat_badan');
        $usia = $this->input->post('usia');
        $alamat = $this->input->post('alamat');

        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan,
            'usia' => $usia,
            'alamat' => $alamat
        );
        // $data2 = array('id_pasien' => $id_pasien);

        $this->load->model('M_autentikasi');

        $this->M_autentikasi->addPasien($data, 'pasien');
        $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>Data Berhasil Ditambahkan</div>');
        redirect('C_autentikasi/login');
    }

    public function login()
    {
        $count = $this->M_makanan->getTesCount();
        $tes = $this->M_makanan->getTes();
        // $harga[] = $data['tes']->harga;
        // $jumlah[] = $data['tes']->jumlah;
        // $total[] = $data['tes']->total;

        // $this->load->view('rekomendasi/navbar');
        // $this->load->view('rekomendasi/index', $data);
        foreach ($tes as $row) {
            $nama[] = $row->nama;
            $harga[] = $row->harga;
            $jumlah[] = $row->jumlah;
            $total[] = $row->total;
            $no[] = $row->no;
        }
        // $jumlah1= array_sum()
        for ($i = 0; $i < 7; $i++) {
            // $x = 6;
            $try = 0;
            // if (($nama[$i] == $nama[$try]) && ($harga[$i] == $harga[$try])) {
            //     $jumlah[$i] += $jumlah[$try];
            //     $try++;
            //     echo "haha /n";
            // echo json_encode($count);
            // } else {
            while ($try <= 6) {
                if (($nama[$i] == $nama[$try]) && ($harga[$i] == $harga[$try]) && ($no[$i] != $no[$try])) {
                    $jumlah[$i] += $jumlah[$try];
                    echo "haha /n";
                    echo json_encode($nama[$i]);
                    echo json_encode($jumlah[$i]);
                }
                // echo json_encode($nama[$i]);
                // echo "coba ";
                $try++;
                echo "tes";
            }
            // $try = 1;
            // if (($nama[$i] == $nama[$try]) && ($harga[$i] == $harga[$try])) {
            //     $jumlah[$i] += $jumlah[$try];
            //     $try++;
            //     echo "haha /n";
            //     echo json_encode($nama[$i]);
            //     echo json_encode($jumlah[$i]);
            // }
            // // }
            // if ($try >= $i) {
            //     echo "masuk";
            //     break;
            // }
        }
        // foreach ($tes as $print) {
        // }
    }

    public function hitungKalori()
    {
        $id_pasien = $this->session->userdata('ses_id');
        // var_dump($id_pasien);
        // $id_pasien= 3;
        $this->load->model('M_pasien');
        $this->load->model('M_makanan');

        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);
        $data['riwayat'] = $this->M_pasien->join($id_pasien);
        $data['rekomendasi'] = $this->M_makanan->getMakanan();

        $this->load->view('rekomendasi/navbar');
        $this->load->view('rekomendasi/index', $data);
    }

    public function loginAsAdmin()
    {
        $this->load->model('M_autentikasi');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $validasi = $this->M_autentikasi->getAuthAdmin($username, $password);
        if ($validasi->num_rows() > 0) {
            $data = $validasi->row_array();
            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('ses_id', $data['username']);

            redirect('Home/dashboard_admin');
        } else {
            $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert"> username dan password salah</div>');
            redirect('C_autentikasi/login');
        }
    }
    public function loginAsUser()
    {
        $this->load->model('M_autentikasi');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->M_autentikasi->authUser($username, $password);

        if ($cek->num_rows() > 0) { //jika login sebagai dosen
            $data = $cek->row_array();
            $this->session->set_userdata('masuk', TRUE);
            $this->session->set_userdata('ses_id', $data['id_pasien']);
            $this->session->set_userdata('ses_nama', $data['nama']);
            redirect('Home/dashboard_pasien');
        } else {
            $this->session->set_flashdata('pesan_error', '<div class="alert alert-danger" role="alert"> username dan password salah</div>');
            redirect('C_autentikasi/login');
        }
        // $this->M_autentikasi->addPasien($data['id_pasien'], 'riwayat_rekomendasi');

    }
}
