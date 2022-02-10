<?php

class C_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function lihatDaftarPasien()
    {
        $this->load->model('M_admin');
        $data['pasien'] = $this->M_admin->getAllPasien();

        $this->load->view('pasien/navbar');
        $this->load->view('pasien/daftarpasien', $data);
    }
    public function cariPasien()
    {
        $keyword = $this->input->post('keyword');
        $this->load->model('M_admin');
        $data['pasien'] = $this->M_admin->searchPasien($keyword);
        $this->load->view('pasien/navbar');
        $this->load->view('pasien/daftarpasien', $data);
    }
    public function unduhDaftarPasien()
    {
        // $id_pasien = $this->session->userdata('ses_id');
        $mulai = $this->input->get('mulai');
        $selesai = $this->input->get('selesai');
        $this->load->model('M_pasien');
        $data['title'] = "Print Daftar Pasien";
        // $data['biodata'] = $this->M_pasien->getData($id_pasien);
        $data['pasien'] = $this->M_pasien->getAllPasien();
        // $this->load->view('riwayat/navbar');
        $this->load->view('pasien/printPasien', $data);
        // var_dump($mulai);
        // die();
    }
    public function hapusPasien($id_pasien)
    {
        $where = array('id_pasien' => $id_pasien);
        $this->load->model('M_admin');
        $this->M_admin->deletePasien($where, 'pasien');
        $this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i>Data Berhasil Dihapus</div>');

        redirect('C_admin/lihatDaftarPasien');
    }
    public function perbaruiPasien()
    {
        $id_pasien = $this->input->post('id_pasien');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $usia = $this->input->post('usia');
        $tinggi_badan = $this->input->post('tinggi_badan');
        $berat_badan = $this->input->post('berat_badan');

        $data = array(

            'id_pasien' => $id_pasien,
            'nama' => $nama,
            'alamat' => $alamat,
            'username' => $username,
            'password' => $password,
            'jenis_kelamin' => $jenis_kelamin,
            'usia' => $usia,
            'tinggi_badan' => $tinggi_badan,
            'berat_badan' => $berat_badan

        );

        $where = array('id_pasien' => $id_pasien);
        $this->load->model('M_admin');
        $this->M_admin->updatePasien($where, $data, 'pasien');
        $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i>Data Berhasil Diperbarui</div>');
        //        $this->load->view('v_datakependudukan', $data);
        redirect('C_admin/lihatDaftarPasien');
    }
    public function logout()
    {
        session_destroy();
        redirect('C_autentikasi/login');
    }
}
