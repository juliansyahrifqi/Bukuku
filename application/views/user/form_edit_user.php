<div class="container-fluid">
    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">EDIT PROFILE</h1>
    </div>
    <div class="row">
        <div class="col-md-6 font-weight-bold">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $users->user_id; ?>" />
                <div class=" form-group">
                    <label for="email" class="col-form-label text-dark">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['user_email']; ?>" readonly>

                </div>
                <div class="form-group">
                    <label for="username" class="col-form-label text-dark">Username: </label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $users->user_username; ?>">
                    <input type="hidden" class="form-control" name="username_lama" value="<?= $users->user_username; ?>">
                    <?= form_error('username', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>

                </div>
                <div class="form-group">
                    <label for="nama" class="col-form-label text-dark">Nama: </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $users->user_nama; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>

                </div>
                <div class="form-group">
                    <label class="font-weight-bold text-dark" for="gambar">Foto Profile</label>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('/upload/user/') . $users->user_gambar; ?>" width="150" height="150" alt="My Profile Image" class="img-thumbnai border rounded border-warning">
                        </div>
                        <div class="col-md-8">
                            <input class="form-control-file ml-0" type="file" name="gambar" id="gambar" />
                            <input type="hidden" name="gambar_lama" value="<?= $users->user_gambar; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>