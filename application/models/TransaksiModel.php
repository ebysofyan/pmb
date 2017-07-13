<?php

/**
 * Created by PhpStorm.
 * User: eby
 * Date: 07/07/17
 * Time: 23:43
 */
class TransaksiModel extends CI_Model
{
    private $table = "transaksi";

    public function getAllTransaksi($status)
    {
        $this->db->select(array('peserta.name', 'peserta.gender', 'peserta.last_study', 'transaksi.id', 'transaksi.created', 'transaksi.key',
            'transaksi.bill_methode', 'transaksi.validation', 'transaksi.status', 'prodi.name as p_name', 'prodi.cost'));

        $this->db->join('peserta', 'transaksi.peserta_id=peserta.id', 'inner');
        $this->db->join('prodi', 'transaksi.prodi_id=prodi.id', 'inner');
        $this->db->where('status', $status);
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function get($id)
    {
        $this->db->where('id', $id);
        return $this->db->get($this->table)->result()[0];
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }

    public function getLatesInsertedId()
    {
        return $this->db->insert_id();
    }

    public function authenticate($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get($this->table)->result();
    }
}