<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Buku_model extends CI_Model
{
    // Ambil semua data buku
    public function getAll()
    {
        return $this->db->get('buku')->result();
    }

    // Ambil data buku berdasarkan id
    public function getById($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row();
    }

    // Tambah data buku
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
    // Akhir tambah buku

    // Edit data buku
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

        // Hapus gambar sebelumnya
        $this->_deleteGambar($this->input->post('id'));
        $this->db->update('buku', $data, ['id_buku' => $this->input->post('id')]);
    }
    // Akhir edit buku

    // Hapus data buku berdasarkan id
    public function delete($id)
    {
        // Hapus data beserta gambarnya
        $this->_deleteGambar($id);
        return $this->db->delete('buku', ['id_buku' => $id]);
    }

    // Upload gambar
    private function _uploadGambar()
    {
        $file_gambar = $_FILES['gambar']['name'];

        // Jika file gambar ada
        // Jika tidak ada masukkan gambar default
        if ($file_gambar) {
            $config['upload_path'] = './upload/buku/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // Maks 2 mb

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                return $this->upload->data('file_name');
            }
        }
        return "default-buku.jpg";
    }

    // Upload edit gambar buku
    private function _uploadEditGambar()
    {
        // Jika gambar baru ditambahkan, ganti gambar buku
        // jika tidak pake gambar lama
        if (!empty($_FILES["gambar"]["name"])) {
            $gambar_buku = $this->_uploadGambar();
        } else {
            $gambar_buku = $this->input->post('gambar_lama');
        }

        return $gambar_buku;
    }
    // Akhir upload edit gambar buku

    // Hapus gambar jika data dihapus
    private function _deleteGambar($id)
    {
        $buku = $this->getById($id);

        // Jika gambar buku bukan default, hapus file gambarnya
        if ($buku->gambar_buku != 'default-buku.jpg') {
            $target_file = explode('.', $buku->gambar_buku)[0];
            return array_map('unlink', glob(FCPATH . "upload/buku/$target_file.*"));
        }
    }
    // Akhir hapus gambar

    // Hitung total banyak buku
    public function countAllBuku()
    {
        return $this->db->count_all_results('buku');
    }
}
