<!-- Begin Page Content -->
<div class="container-fluid">

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

    <div class="row">
        <!-- Jika Data Buku kosong atau tidak ada -->
        <?php if (empty($favorit)) { ?>
            <div class="alert alert-danger">Data buku belum ada </div>

            <!-- Jika Data Buku tidak kosong -->
        <?php } else { ?>
            <?php foreach ($favorit as $f) : ?>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" height="220" src="<?= base_url('/upload/buku/' . $f->gambar_buku); ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $f->judul_buku; ?></h5>
                            <p class="card-text"><?= ucfirst($f->penulis_buku); ?></p>
                            <hr class="divider">

                            <p class="card-text"><?= $f->deskripsi_buku; ?></p>

                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteFavouriteModal">
                                Hapus dari favorit</a>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteFavouriteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
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
                                <a class="btn btn-primary" href="<?= base_url('user/favorit/deleteFavourite/' . $f->id_favorit); ?>">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php } ?>
    </div>
</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->