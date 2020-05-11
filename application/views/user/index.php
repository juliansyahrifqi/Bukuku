<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Jika tambah favorit gagal-->
    <?php if ($this->session->flashdata('failed')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('failed'); ?>
        </div>
    <?php endif; ?>


    <!-- Page Heading -->
    <h3 class="mb-5 font-weight-bold text-dark text-center">My Profile</h3>

    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card shadow mb-5">
                <img src="<?= base_url('./upload/user/') . $user['user_gambar']; ?>" style="width: 200px; height:200px;" class="card-img mx-auto rounded-circle img-fluid border m-4" alt="My Profile Image">

                <div class="card-body text-center">
                    <h5 class="card-title text-uppercase font-weight-bold text-dark"><?= $user['user_nama']; ?></h5>
                    <p class="card-text"><?= $user['user_email']; ?></p>
                    <p class="card-text"><?= $user['user_username']; ?></p>
                    <p class="card-text"><?= $user['date_created']; ?></p>
                </div>

                </>
                <hr width="75%" class="mx-auto">
                <div class="text-center mb-3">
                    <a href="<?= base_url('user/profile/editAccount/') . $user['user_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit Akun</a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        <i class="fas fa-trash"></i> Hapus Akun
                    </a>
                </div>
            </div>
        </div>

        <!-- Delete Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModal">Anda yakin akan menghapus akun ?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Data akun anda akan dihapus. Tekan hapus
                        jika anda sudah yakin ingin menghapus akun
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url('user/profile/deleteAccount/' . $user['user_id']); ?>">Hapus Akun </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->