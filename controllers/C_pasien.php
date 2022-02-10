<?php

class C_pasien extends CI_Controller
{

    public function lihatData($id_pasien)
    {
        $this->load->model('M_pasien');
        $data['pasien'] = $this->M_pasien->getRiwayatMakanan($id_pasien);
        $data['biodatapasien'] = $this->M_pasien->getData($id_pasien);

        // echo json_encode($data['pasien']);
        $this->load->view('pasien/navbar');
        $this->load->view('pasien/detailPasien', $data);
    }
    public function ubahData()
    {
        $id_pasien = $this->session->userdata('ses_id');

        $this->load->model('M_pasien');
        // $this->load->model('M_makanan');

        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);

        $this->load->view('profil/navbar');
        $this->load->view('profil/ubah', $data);
    }
    public function perbaruiData()
    {
        $id_pasien = $this->input->post('id_pasien');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $usia = $this->input->post('usia');
        $berat_badan = $this->input->post('berat_badan');
        $tinggi_badan = $this->input->post('tinggi_badan');

        $data = array(
            'id_pasien' => $id_pasien,
            'nama' => $nama,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password,
            'usia' => $usia,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan
        );
        $where = array('id_pasien' => $id_pasien);
        $this->load->model('M_pasien');
        $this->M_pasien->updatePasien($where, $data, 'pasien');
        $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>Data Berhasil Diperbarui</div>');
        redirect('Home/dashboard_pasien');
    }
    public function riwayatMakanan()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mulai', 'mulai tanggal', 'required');
        $this->form_validation->set_rules('selesai', 'selesai tanggal', 'required');
        $id_pasien = $this->session->userdata('ses_id');
        $mulai = $this->input->post('mulai');
        $selesai = $this->input->post('selesai');
        $data['tanggal'] = array(
            'mulai' => $mulai,
            'selesai' => $selesai
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('riwayat/navbar');
            $this->load->view('riwayat/index');
        } else {
            $this->load->model('M_pasien');
            $data['riwayat'] = $this->M_pasien->getPilihRiwayat($id_pasien, $mulai, $selesai);
            // while ()
            $this->load->view('riwayat/navbar');
            $this->load->view('riwayat/riwayat', $data);
        }
    }
    public function unduhRiwayatMakanan()
    {
        $id_pasien = $this->session->userdata('ses_id');
        $mulai = $this->input->get('mulai');
        $selesai = $this->input->get('selesai');
        $this->load->model('M_pasien');
        $data['title'] = "Print Riwayat Makanan";
        $data['biodata'] = $this->M_pasien->getData($id_pasien);
        $data['riwayat'] = $this->M_pasien->getPilihRiwayat($id_pasien, $mulai, $selesai);
        // $this->load->view('riwayat/navbar');
        $this->load->view('riwayat/printRiwayat', $data);
        // var_dump($mulai);
        // die();
    }
    public function logout()
    {
        session_destroy();
        redirect('C_autentikasi/login');
    }
}
