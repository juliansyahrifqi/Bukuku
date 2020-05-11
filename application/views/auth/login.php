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
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN</h1>
                                </div>

                                <!-- Jika pesan sukses-->
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- jika pesan gagal -->
                                <?php if ($this->session->flashdata('failed')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= $this->session->flashdata('failed'); ?>
                                    </div>
                                <?php endif; ?>

                                <!-- input form -->
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukkan Email atau Username ..." value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-2"><i class="fas fa-exclamation-circle">', '</small></i>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <!-- Akhir input form -->

                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/daftar'); ?>">Belum punya akun ? Daftar disini!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>