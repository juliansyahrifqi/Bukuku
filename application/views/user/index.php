<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h3 class="mb-5 font-weight-bold text-dark text-center">My Profile</h3>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 my-auto">
                        <img src="<?= base_url('./upload/user/') . $user['user_gambar']; ?>" class="card-img img-fluid" alt="My Profile Image">
                    </div>
                    <div class="col-md-8 my-auto">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $user['user_nama']; ?></h5>
                            <p class="card-text"><?= $user['user_email']; ?></p>
                            <p class="card-text"><?= $user['user_username']; ?></p>
                            <p class="card-text"><?= $user['date_created']; ?></p>
                        </div>
                    </div>
                </div>
                <hr class="divider">
                <div class="text-center my-2">
                    <div class="btn btn-primary">Edit Akun</div>
                    <div class="btn btn-danger">Hapus Akun</div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->