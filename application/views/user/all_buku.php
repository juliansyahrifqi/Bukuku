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
        <?php if (empty($buku)) { ?>
            <div class="alert alert-danger">Data buku belum ada </div>

            <!-- Jika Data Buku tidak kosong -->
        <?php } else { ?>
            <?php foreach ($buku as $b) : ?>

                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top" height="220" src="<?= base_url('/upload/buku/' . $b->gambar_buku); ?>" alt="Card image cap">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold"><?= $b->judul_buku; ?></h5>
                            <p class="card-text"><?= ucfirst($b->penulis); ?></p>
                            <hr class="divider">

                            <p class="card-text"><?= $b->deskripsi; ?></p>

                            <form action="<?= base_url('user/allbuku/addFavourite'); ?>" method="post">
                                <input type="hidden" name="id_buku" value="<?= $b->id_buku; ?>" />
                                <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>" />

                                <button type="submit" class="btn btn-primary"> Add to My Favourite</button>
                            </form>

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