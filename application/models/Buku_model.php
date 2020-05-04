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
        return $this->db->get_where('buku', ["id_buku" => $id])->row();
    }

    public function insert()
    {
        $data = [
            'id_buku' => uniqid(),
            'judul_buku' => $this->input->post('judul'),
            'gambar_buku' => $this->_uploadImage(),
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun_beli' => $this->input->post('tahun')
        ];

        $this->db->insert('buku', $data);
    }

    public function update()
    {
        $data = [
            'id_buku' => $this->input->post('id'),
            'judul_buku' => $this->input->post('judul'),
            'gambar_buku' => $this->_uploadImage(),
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun_beli' => $this->input->post('tahun')
        ];

        $this->db->where('id_buku', 'id');
        $this->db->update($data);
    }

    public function delete($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('buku');
    }

    private function _uploadImage()
    {
        $upload_gambar = $_FILES['gambar']['name'];

        if ($upload_gambar) {
            $config['upload_path'] = './upload/buku/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                return $this->upload->data('file_name');
            } else {
                echo ($this->upload->display_errors());
            }
        }
    }
}
