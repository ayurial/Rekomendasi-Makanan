<?php

class M_makanan extends CI_Model
{
    public function getAllMakanan()
    {
        return $this->db->from('makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')->get()->result();
    }
    public function getTes()
    {
        return $this->db->from('tes')->get()->result();
    }
    public function getTesCount()
    {
        $query = $this->db->query("SELECT COUNT(*) AS Total From tes ");

        return $query->result();
    }

    // public function getMakanan($jenis_makanan = NULL)
    // {
    //     return $this->db->from('makanan')
    //         ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')->where('jenis_makanan.id_jenis', $jenis_makanan)->get()->result();
    // }
    public function deleteMakanan($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function addMakanan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function searchMakanan($keyword)
    {
        $this->db->from('makanan')
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan');
        $this->db->like('nama_makanan', $keyword);
        $this->db->or_like('nama_jenis', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get()->result();
    }

    public function updateMakanan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function getTotalMakanan()
    {
        $query = $this->db->query("SELECT COUNT(*) AS Total From makanan ");

        return $query->row();
    }
    public function getHarga($id = NULL)
    {
        $this->db->select('harga');
        $query = $this->db->from('makanan')->where('id_makanan', $id);

        return $query->get()->row();
    }
    public function getMakanan($id = NULL)
    {
        return $this->db->from('makanan')->where('makanan.id_makanan', $id)
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->get()->row();
    }
    public function getNull()
    {
        return $this->db->from('makanan')->where('makanan.id_makanan', 0)
            ->join('jenis_makanan', 'jenis_makanan.id_jenis=makanan.jenis_makanan')
            ->get()->row();
    }
    public function getId()
    {
        $this->db->select('id_makanan');
        $query = $this->db->from('makanan');

        return $query->get()->result();
    }
    public function getnama()
    {
        $this->db->select('nama_makanan');
        $query = $this->db->from('makanan');

        return $query->get()->result();
    }
}
