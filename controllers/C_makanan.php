<?php

class C_makanan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('M_login');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function cariMakanan()
    {
        $uname = $this->session->userdata('ses_id');
        $keyword = $this->input->post('keyword');
        $this->load->model('M_makanan');
        $data['makanan'] = $this->M_makanan->searchMakanan($keyword);
        if ($uname == "admin") {
            $this->load->view('makanan/navbar');
            $this->load->view('makanan/index', $data);
        } else {
            $this->load->view('homepage/navbar');
            $this->load->view('homepage/index', $data);
        }
    }

    public function lihatDaftarMakanan()
    {
        $this->load->model('M_makanan');
        $data['makanan'] = $this->M_makanan->getAllMakanan();
        $uname = $this->session->userdata('ses_id');
        $keyword = $this->input->post('keyword');
        $this->load->model('M_makanan');
        $data['makanan'] = $this->M_makanan->searchMakanan($keyword);
        if ($uname == "admin") {
            $this->load->view('makanan/navbar');
            $this->load->view('makanan/index', $data);
        } else {
            $this->load->view('homepage/navbar');
            $this->load->view('homepage/index', $data);
        }
    }
    public function lihatDetailMakanan()
    {
        $this->load->model('M_makanan');
        $data['makanan'] = $this->M_makanan->getMakanan();

        $this->load->view('makanan/navbar');
        $this->load->view('makanan/index', $data);
    }

    public function hapusMakanan($id_makanan)
    {
        $where = array('id_makanan' => $id_makanan);
        $this->load->model('M_makanan');
        $this->M_makanan->deleteMakanan($where, 'makanan');
        $this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i>Data Berhasil Dihapus</div>');
        redirect('C_makanan/lihatDaftarMakanan');
    }

    public function perbaruiMakanan()
    {
        $this->form_validation->set_rules('jenis_makanan', 'jenis makanan', 'required');
        $this->form_validation->set_rules('nama_makanan', 'nama makanan', 'required');
        $this->form_validation->set_rules('jumlah_karbohidrat', 'jumlah karbohidrat', 'required');
        $this->form_validation->set_rules('jumlah_protein', 'jumlah protein', 'required');
        $this->form_validation->set_rules('jumlah_lemak', 'jumlah lemak', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == TRUE) {

            $id_makanan = $this->input->post('id_makanan');
            $jenis_makanan = $this->input->post('jenis_makanan');
            $nama_makanan = $this->input->post('nama_makanan');
            $jumlah_karbohidrat = $this->input->post('jumlah_karbohidrat');
            $jumlah_protein = $this->input->post('jumlah_protein');
            $jumlah_lemak = $this->input->post('jumlah_lemak');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(

                'id_makanan' => $id_makanan,
                'jenis_makanan' => $jenis_makanan,
                'nama_makanan' => $nama_makanan,
                'jumlah_karbohidrat' => $jumlah_karbohidrat,
                'jumlah_protein' => $jumlah_protein,
                'jumlah_lemak' => $jumlah_lemak,
                'harga' => $harga,
                'deskripsi' => $deskripsi

            );
            $where = array('id_makanan' => $id_makanan);
            $this->load->model('M_makanan');
            $this->M_makanan->updateMakanan($where, $data, 'makanan');
            $this->session->set_flashdata('update', '<div class="alert alert-success" role="alert"> <i class="fa fa-check"></i>Data Berhasil Diperbarui</div>');
            redirect('C_makanan/lihatDaftarMakanan');
        }
    }
    public function tambahMakanan()
    {
        // $this->load->library('session');
        // $this->load->library('form_validation');
        $this->form_validation->set_rules('jenis_makanan', 'jenis makanan', 'required');
        $this->form_validation->set_rules('nama_makanan', 'nama makanan', 'required');
        $this->form_validation->set_rules('jumlah_karbohidrat', 'jumlah karbohidrat', 'required');
        $this->form_validation->set_rules('jumlah_protein', 'jumlah protein', 'required');
        $this->form_validation->set_rules('jumlah_lemak', 'jumlah lemak', 'required');
        $this->form_validation->set_rules('harga', 'harga', 'required');

        if ($this->form_validation->run() == TRUE) {
            $jenis_makanan = $this->input->post('jenis_makanan');
            $nama_makanan = $this->input->post('nama_makanan');
            $jumlah_karbohidrat = $this->input->post('jumlah_karbohidrat');
            $jumlah_protein = $this->input->post('jumlah_protein');
            $jumlah_lemak = $this->input->post('jumlah_lemak');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');

            $data = array(

                'jenis_makanan' => $jenis_makanan,
                'nama_makanan' => $nama_makanan,
                'jumlah_karbohidrat' => $jumlah_karbohidrat,
                'jumlah_protein' => $jumlah_protein,
                'jumlah_lemak' => $jumlah_lemak,
                'harga' => $harga,
                'deskripsi' => $deskripsi

            );

            $this->load->model('M_makanan');
            $this->M_makanan->addMakanan($data, 'makanan');

            $this->session->set_flashdata('success', '<div class="alert alert-success" role="alert"><i class="fa fa-check"></i>Data Makanan Berhasil Ditambahkan</div>');
            redirect('C_makanan/lihatDaftarMakanan');
        }
    }
}
