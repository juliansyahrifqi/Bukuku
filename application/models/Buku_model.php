<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('buku')->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function insert()
    {
        $data = [
            'id_buku' => uniqid(),
            'judul_buku' => $this->input->post('judul'),
            'gambar_buku' => 'default-buku.jpg',
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun_beli' => time()
        ];

        $this->db->insert('buku', $data);
    }

    public function update()
    {
        $data = [
            'id_buku' => $this->input->post('id'),
            'judul_buku' => $this->input->post('judul'),
            'gambar_buku' => 'default-buku.jpg',
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun_beli' => time()
        ];

        $this->db->where('id_buku', 'id');
        $this->db->update($data);
    }

    public function delete($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }
}
