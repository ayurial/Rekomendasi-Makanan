<?php

class M_autentikasi extends CI_Model
{
    public function getAuthAdmin($username, $password)
    {
        $query = $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
    public function getAuthPasien($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function getId($username = NULL)
    {
        $this->db->select('id_pasien');
        return $this->db->from('pasien')
            ->where('pasien.username', $username)
            ->get()->result();
    }
    public function authUser($username, $password)
    {
        $query = $this->db->query("SELECT * FROM pasien WHERE username='$username' AND password='$password' LIMIT 1");
        return $query;
    }
    public function addPasien($data, $table)
    {
        $this->db->insert($table, $data);
    }
}
