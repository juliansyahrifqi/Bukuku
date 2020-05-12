<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Judul -->
    <h3 class="mb-4 font-weight-bold text-dark text-center">List Buku Favorit </h3>

    <!-- Jika pesan sukses -->
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Jika pesan gagal-->
    <?php if ($this->session->flashdata('failed')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('failed'); ?>
        </div>
    <?php endif; ?>

    <!-- Main Content-->
    <div class="row">
        <!-- Jika Data Buku kosong atau tidak ada -->
        <?php if (empty($favorit)) { ?>
            <div class="alert alert-danger col-md-6 text-center mx-auto">Belum ada buku favorit </div>

            <!-- Jika Data Buku tidak kosong -->
        <?php } else { ?>
            <?php $i = 0; ?>
            <?php foreach ($favorit as $f) : ?>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" height="220" src="<?= base_url('/upload/buku/' . $f->gambar_buku); ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $f->judul_buku; ?></h5>
                            <p class="card-text"><?= ucfirst($f->penulis_buku); ?></p>
                            <hr class="divider">

                            <p class="card-text"><?= $f->deskripsi_buku; ?></p>

                            <a href="" class="btn btn-dark" data-toggle="modal" data-target="#detailModal<?= $i; ?>">
                                <small><i class="fas fa-info"></i></small> Detail Buku
                            </a>

                            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteFavouriteModal<?= $f->id_favorit; ?>">
                                <small><i class="fas fa-trash"></i></small>
                                Hapus dari favorit
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Modal Detail Buku -->
                <div class="modal fade" id="detailModal<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-dark">Detail Buku</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <img src="<?= base_url('upload/buku/') . $f->gambar_buku; ?>" height="400" alt="Gambar Buku">
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-center">

                                        <h4 class="font-weight-bold text-dark mb-4"><?= $f->judul_buku; ?></h4>
                                        <table width=" 100%" class="text-dark">
                                            <tr>
                                                <th class="border bg-light">Penulis:</th>
                                                <td class="border"><?= $f->penulis_buku; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="border bg-light">Penerbit:</th>
                                                <td class="border"><?= $f->penerbit_buku; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="border bg-light">Tahun Beli:</th>
                                                <td class="border"><?= $f->tahun_beli; ?></td>
                                            </tr>
                                            <tr>
                                                <th class="border bg-light">Id Buku:</th>
                                                <td class="border"><?= $f->id_buku; ?></td>
                                            </tr>
                                        </table>
                                        <div class="card rounded-0 mt-3">
                                            <p><?= $f->deskripsi_buku; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Akhir modal detail buku -->

                <!-- Modal delete favorit -->
                <div class="modal fade" id="deleteFavouriteModal<?= $f->id_favorit; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModal">Yakin mau dihapus ?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Buku favorit anda akan dihapus. Tekan hapus
                                jika anda sudah yakin ingin menghapus
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-danger" href="<?= base_url('user/favorit/deleteFavourite/' . $f->id_favorit); ?>">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Akhir modal delete favorit -->

                <?php $i++; ?>
            <?php endforeach; ?>
        <?php } ?>
    </div>
    <!-- /.container-fluid -->
</div>

</div>
<!-- End of Main Content -->