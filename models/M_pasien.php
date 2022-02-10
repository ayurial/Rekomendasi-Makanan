<?php

class M_pasien extends CI_Model
{
    public function getAllPasien()
    {
        return $this->db->from('pasien')
            ->get()->result();
    }
    public function getPasien($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->get()->row();
    }
    public function getIdRiwayat($id_pasien = NULL)
    {
        $this->db->select('id_riwayat');
        return $this->db->from('pasien')
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->get()->result();
    }
    public function cekdata($id_pasien)
    {
        $query = $this->db->query("SELECT COUNT($id_pasien) From riwayat_rekomendasi");

        return $query;
    }
    public function getMax()
    {
        $query = $this->db->query("SELECT MAX(id_riwayat) From riwayat_rekomendasi");

        return $query;
    }

    public function tambah($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function tambahdata($data)
    {
        return $this->db->insert_batch('hasil_rekomendasi', $data);
    }


    public function deletePasien($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function join($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->join('makanan', 'makanan.id_makanan=hasil_rekomendasi.id_makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->get()
            ->result_array();
    }
    public function editPasien($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)->get()->row();

        // return $this->db->from('pasien')
        //     ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')->where('riwayat_rekomendasi.id_pasien', $id_pasien)
        //     ->join('')
        //     ->get()
        //     ->row();
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
    public function getData($id_pasien = NULL)
    {
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)->get()->row();
    }
    public function getRiwayatMakanan($id_pasien = NULL)
    {
        $this->db->select('tanggal_rekomendasi, AMB, kebutuhan_karbohidrat, kebutuhan_protein, kebutuhan_lemak, nama_makanan, harga, jumlah_karbohidrat, jumlah_protein, jumlah_lemak');
        return $this->db->from('pasien')
            ->where('pasien.id_pasien', $id_pasien)
            ->join('riwayat_rekomendasi', 'riwayat_rekomendasi.id_pasien=pasien.id_pasien')
            ->join('hasil_rekomendasi',  'hasil_rekomendasi.id_riwayat=riwayat_rekomendasi.id_riwayat')
            ->join('makanan', 'makanan.id_makanan=hasil_rekomendasi.id_makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->order_by('tanggal_rekomendasi', 'ASC')
            ->get()
            ->result_array();
    }
    public function getPilihRiwayat($id_pasien = NULL, $mulai, $selesai)
    {
        // $query = $this->db->query("SELECT * FROM pasien p, riwayat_rekomendasi r, hasil_rekomendasi h WHERE p.id_pasien='$id_pasien' AND r.id_pasien=p.id_pasien AND r.id_riwayat=h.id_riwayat AND date(tanggal_rekomendasi) >= '$mulai' AND date (tanggal_rekomendasi) <='$selesai'");
        // echo json_encode($query);
        $query = $this->db->query("SELECT * FROM pasien p, riwayat_rekomendasi r, hasil_rekomendasi h, makanan m, jenis_makanan j WHERE p.id_pasien='$id_pasien' AND r.id_pasien=p.id_pasien AND r.id_riwayat=h.id_riwayat AND m.id_makanan=h.id_makanan AND j.id_jenis=m.jenis_makanan AND date(tanggal_rekomendasi) >= '$mulai' AND date (tanggal_rekomendasi) <='$selesai' order by tanggal_rekomendasi asc");
        return $query->result_array();
    }
}
