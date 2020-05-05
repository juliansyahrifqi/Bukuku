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
        return $this->db->get_where('buku', ['id_buku' => $id])->row();
    }

    public function insert()
    {
        $data = [
            'id_buku' => uniqid(),
            'judul_buku' => $this->input->post('judul'),
            'gambar_buku' => $this->_uploadGambar(),
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
            'gambar_buku' => $this->_uploadEditGambar(),
            'penerbit' => $this->input->post('penerbit'),
            'penulis' => $this->input->post('penulis'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tahun_beli' => $this->input->post('tahun')
        ];

        $this->_deleteGambar($this->input->post('id'));
        $this->db->update('buku', $data, ['id_buku' => $this->input->post('id')]);
    }

    public function delete($id)
    {
        $this->_deleteGambar($id);
        return $this->db->delete('buku', ['id_buku' => $id]);
    }

    private function _uploadGambar()
    {
        $file_gambar = $_FILES['gambar']['name'];

        if ($file_gambar) {
            $config['upload_path'] = './upload/buku/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                return $this->upload->data('file_name');
            }
        } else {
            return "default-buku.jpg";
        }
    }

    private function _uploadEditGambar()
    {
        if (!empty($_FILES["gambar"]["name"])) {
            $gambar_buku = $this->_uploadGambar();
        } else {
            $gambar_buku = $this->input->post('gambar_lama');
        }

        return $gambar_buku;
    }

    private function _deleteGambar($id)
    {
        $buku = $this->getById($id);

        if ($buku->gambar_buku != 'default-buku.jpg') {
            $target_file = explode('.', $buku->gambar_buku)[0];
            return array_map('unlink', glob(FCPATH . "upload/buku/$target_file.*"));
        }
    }
}
