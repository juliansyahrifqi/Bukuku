<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Jika status berhasil-->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Jika status gagal-->
    <?php if ($this->session->flashdata('failed')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('failed'); ?>
        </div>
    <?php endif; ?>

    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-icon-split" href="<?= site_url('admin/buku/add') ?>">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">
                    Tambah Data
                </span>
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No. </th>
                            <th scope="col">Judul</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tahun Beli</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Jika Data Buku kosong atau tidak ada -->
                        <?php if (empty($buku)) { ?>
                            <div class="alert alert-danger">Data buku belum ada </div>

                            <!-- Jika Data Buku tidak kosong -->
                        <?php } else { ?>
                            <?php $i = 1; ?>
                            <?php foreach ($buku as $b) : ?>
                                <tr class="text-center">
                                    <td>
                                        <?= $i++ ?>
                                    </td>
                                    <td>
                                        <?= $b->judul_buku; ?>
                                    </td>
                                    <td>
                                        <img src="<?= base_url('upload/buku/' . $b->gambar_buku); ?>" width="80" />
                                    </td>
                                    <td>
                                        <?= $b->penerbit; ?>
                                    </td>
                                    <td>
                                        <?= $b->penulis; ?>
                                    </td>
                                    <td class="small">
                                        <?= substr($b->deskripsi, 0, 120); ?>...
                                    </td>
                                    <td width="150">
                                        <?= $b->tahun_beli; ?>
                                    </td>
                                    <td width="150">
                                        <a href="<?= base_url('admin/buku/edit/' . $b->id_buku); ?>" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a>
                                        <a href="" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal<?= $b->id_buku; ?>">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Konfirmasi Delete 
                                    Delete Modal -->
                                <div class="modal fade" id="deleteModal<?= $b->id_buku; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModal">Yakin mau dihapus ?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Buku akan dihapus. Tekan hapus
                                                jika anda sudah yakin ingin menghapus
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="<?= base_url('admin/buku/delete/' . $b->id_buku); ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->