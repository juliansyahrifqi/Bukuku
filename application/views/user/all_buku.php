<!-- Begin Page Content -->
<div class="container-fluid">
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
                            <a href="#" class="btn btn-primary">Add To My Favourite</a>
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