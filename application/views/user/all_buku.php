<!-- Begin Page Content -->
<div class="container-fluid">
    <h3 class="mb-4 font-weight-bold text-dark text-center">List Semua Buku</h3>

    <!-- Jika pesan sukses -->
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
        <?php if (empty($buku)) { ?>
            <div class="alert alert-danger col-md-6 text-center mx-auto">Data buku belum ada </div>

            <!-- Jika Data Buku tidak kosong -->
        <?php } else { ?>
            <?php $i = 0; ?>
            <?php foreach ($buku as $b) : ?>

                <div class="col-md-4 col-sm-6 mb-4">

                    <div class="card shadow">
                        <img class="card-img-top" height="220" src="<?= base_url('/upload/buku/' . $b->gambar_buku); ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $b->judul_buku; ?></h5>
                            <p class="card-text"><?= ucfirst($b->penulis); ?></p>
                            <hr class="divider">

                            <p class="card-text"><?= $b->deskripsi; ?></p>

                            <!-- input form tambah favorit -->
                            <form action="<?= base_url('user/favorit/addFavourite'); ?>" method="post">
                                <input type="hidden" name="id_buku" value="<?= $b->id_buku; ?>" />
                                <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" />
                                <a href="" class="btn btn-dark" data-toggle="modal" data-target="#detailModal<?= $i; ?>"><small><i class="fas fa-info"></i></small> Detail Buku</a>
                                <button type="submit" class="btn btn-success"><small><i class="fas fa-star"></i></small> Add to Favourite</button>

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
                                                            <img src="<?= base_url('upload/buku/') . $b->gambar_buku; ?>" height="400" alt="Gambar Buku">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">

                                                        <h4 class="font-weight-bold text-dark mb-4"><?= $b->judul_buku; ?></h4>
                                                        <table width=" 100%" class="text-dark">
                                                            <tr>
                                                                <th class="border bg-light">Penulis:</th>
                                                                <td class="border"><?= $b->penulis; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="border bg-light">Penerbit:</th>
                                                                <td class="border"><?= $b->penerbit; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="border bg-light">Tahun Beli:</th>
                                                                <td class="border"><?= $b->tahun_beli; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th class="border bg-light">Id Buku:</th>
                                                                <td class="border"><?= $b->id_buku; ?></td>
                                                            </tr>
                                                        </table>
                                                        <div class="card rounded-0 mt-3">
                                                            <p><?= $b->deskripsi; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success"><small><i class="fas fa-star"></i></small> Add to Favourite</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- akhir form tambah favorit -->

                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php } ?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->