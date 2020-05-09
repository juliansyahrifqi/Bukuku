<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Favorit_model extends CI_Model
{
    public function addFavourite()
    {
        $data = [
            'id_favorit' => uniqid(),
            'user_id' => $this->input->post('user_id'),
            'id_buku' => $this->input->post('id_buku')
        ];

        $this->db->insert('favorit', $data);
    }

    public function getFavourite($id)
    {
        $this->db->select('favorit.id_favorit, buku.judul_buku as judul_buku, buku.gambar_buku as gambar_buku, buku.penulis as penulis_buku, buku.deskripsi as deskripsi_buku');
        $this->db->from('favorit');
        $this->db->join('buku', 'favorit.id_buku = buku.id_buku', 'INNER');
        $this->db->join('user', 'favorit.user_id = user.user_id', 'INNER');
        $this->db->where('user.user_id', $id);

        $query = $this->db->get()->result();
        return $query;
    }

    public function deleteFavourite($id)
    {
        return $this->db->delete('favorit', ['id_favorit' => $id]);
    }
}
