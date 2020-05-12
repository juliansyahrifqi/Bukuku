<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">EDIT DATA</h1>
                                    </div>

                                    <!-- Form input edit-->
                                    <form class="buku" method="post" action="" enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?= $buku->id_buku; ?>" />

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="judul"> Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Nama Judul Buku" value="<?= $buku->judul_buku; ?>">
                                            <?= form_error('judul', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="penerbit"> Penerbit Buku</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Nama Penerbit" value="<?= $buku->penerbit; ?>">
                                            <?= form_error('penerbit', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="penulis"> Penulis Buku</label>
                                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Nama Penulis" value="<?= $buku->penulis; ?>">
                                            <?= form_error('penulis', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="deskripsi"> Deskripsi Buku</label>
                                            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi Buku"><?= $buku->deskripsi ?></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class=" form-group">
                                            <label class="font-weight-bold text-dark" for="tahun"> Tahun Beli</label>
                                            <div class="input-group date w-50">
                                                <input type=" text" class="form-control" id="tahun" name="tahun" value="<?= $buku->tahun_beli; ?>" readonly>
                                                <span class="input-group-addon">
                                                    <button class="btn btn-light" type="button"><i class="fas fa-calendar-alt"></i></button>
                                                </span>
                                            </div>
                                            <?= form_error('tahun', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="gambar">Gambar Buku</label>
                                            <input class="form-control-file" type="file" name="gambar" id="gambar" />
                                            <input type="hidden" name="gambar_lama" value="<?= $buku->gambar_buku; ?>">
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            Edit
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            Reset
                                        </button>
                                    </form>
                                    <!-- Akhir form input edit -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->