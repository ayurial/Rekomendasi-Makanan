<?php

class M_admin extends CI_Model
{
    public function getAllPasien()
    {
        return $this->db->from('pasien')->get()->result();
    }
    public function getPasien()
    {
    }
    public function deletePasien($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function join($id_pasien = NULL)
    {
        $this->db->select('tanggal_rekomendasi, AMB, kebutuhan_karbohidrat, kebutuhan_protein, kebutuhan_lemak, nama_makanan, harga, jumlah_karbohidrat, jumlah_protein, jumlah_lemak');
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->join('makanan', 'makanan.id_makanan=hasil_rekomendasi.id_makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->get()
            ->result_array();
    }
    public function getRiwayat($id_pasien = NULL)
    {
        $this->db->select('tanggal_rekomendasi, AMB');
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->get()->result_array();
    }
    public function getAMB($id_pasien = NULL)
    {
        $this->db->select('AMB');
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            // ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->get()->result_array();
    }
    public function getMakanan($id_pasien = NULL)
    {
        $this->db->select('hasil_rekomendasi.id_riwayat, nama_makanan');
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->join('makanan', 'makanan.id_makanan=hasil_rekomendasi.id_makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->get()->result_array();
    }

    public function join2($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->get()->result_array();
    }
    public function editPasien($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)->get()->row();
    }

    public function updatePasien($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function searchPasien($keyword)
    {
        $this->db->from('pasien');
        // ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan');
        $this->db->like('nama', $keyword);
        $this->db->or_like('jenis_kelamin', $keyword);
        $this->db->or_like('usia', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get()->result();
    }
}
