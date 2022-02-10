<?php

class Home extends CI_Controller
{
    // public function index()
    // {
    //     $this->load->view('homepage/navbar');
    //     $this->load->view('homepage/index');
    // }
    public function dashboard_admin()
    {

        echo json_encode($this->session->userdata("admin", "login"));
        redirect('C_admin/lihatDaftarPasien');
    }
    public function dashboard_pasien()
    {
        $id_pasien = $this->session->userdata('ses_id');

        $this->load->model('M_pasien');
        // $this->load->model('M_makanan');

        $data['pasien'] = $this->M_pasien->getPasien($id_pasien);

        $this->load->view('profil/navbar');
        $this->load->view('profil/index', $data);
    }
}
