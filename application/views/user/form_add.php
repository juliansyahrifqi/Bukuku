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
                                        <h1 class="h4 text-gray-900 mb-4">ADD DATA</h1>
                                    </div>

                                    <form class="buku" method="post" action="<?= base_url('buku/add'); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="judul"> Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Nama Judul Buku" value="<?= set_value('judul'); ?>">
                                            <?= form_error('judul', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="penerbit"> Penerbit Buku</label>
                                            <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Nama Penerbit" value="<?= set_value('penerbit'); ?>">
                                            <?= form_error('penerbit', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="penulis"> Penulis Buku</label>
                                            <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Nama Penulis" value="<?= set_value('penulis'); ?>">
                                            <?= form_error('penulis', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-bold text-dark" for="deskripsi"> Deskripsi Buku</label>
                                            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi" placeholder="Deskripsi Buku" value="<?= set_value('deskripsi'); ?>"></textarea>
                                            <?= form_error('deskripsi', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class=" form-group">
                                            <label class="font-weight-bold text-dark" for="tahun"> Tahun Beli</label>
                                            <div class="input-group date w-50">
                                                <input type=" text" class="form-control" id="tahun" name="tahun" value="<?= set_value('tahun'); ?>" readonly>
                                                <span class="input-group-addon">
                                                    <button class="btn btn-light" type="button"><i class="fas fa-calendar-alt"></i></button>
                                                </span>
                                            </div>
                                            <?= form_error('tahun', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="name">Gambar Buku</label>
                                            <input class="form-control-file" type="file" name="gambar" id="gambar" />
                                        </div>

                                        <button type="submit" class="btn btn-primary">
                                            Add
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            Reset
                                        </button>
                                    </form>
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

<?php $this->load->view('template/js.php'); ?>
<script type="text/javascript">
    $(".date").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        autoclose: true
    });
</script>
</body>

</html>
<!-- End of Main Content -->